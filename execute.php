<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update) {
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = strtolower(trim($text));

header("Content-Type: application/json");
$response = '';

function printcourse($command, $course, $newline = true) {
	if(isset($course['code'])) {
		if(is_array($course['code'])) {
			$code = implode(', ', $course['code']);
		} else {
			$code = $course['code'];
		}
		$code = " ($code)";
	} else {
		$code = '';
	}

	if($command === null) {
		$command = '';
	} else {
		$command = "/$command - ";
	}

	$newline = $newline ? "\n" : '';

	return "$command${course['name']}$code$newline";
}

//========================================================================================
//	START: Guida, triennale/magistrale (elenco corsi)
//========================================================================================

if($text == "/start") {
	$response = <<<EOT
Ciao $firstname, benvenuto/a!
Puoi utilizzare il bot in più modi:
- Inserendo manualmente il codice dell'esame (ad esempio '18AULOA', senza apici),
- Inserendo un'abbreviazione, ad esempio /apa.
Se vuoi un gruppo per parlare di qualsiasi cosa (cazzeggio), vai al /bar usando questo comando. ;)
Se hai bisogno del gruppo dei Rappresentanti degli Studenti, puoi trovarlo tramite il comando /rappresentanti.
Per la compravendita di libri o appunti, parlatene su /libri, mentre se avete bisogno di ripetizioni, andandate su /ripetizioni. Se sei alla ricerca di un gruppo generale sul tirocinio (triennale), usa subito il comando /tirocinio. Se usi Linux troverai interessante @linuxpolito. 
Ho anche creato un canale per chi vuole seguire i cambiamenti del bot (/changelog).

Non conoscete tutte le abbreviazioni o i codici? Nessun problema! Potete generare una lista di tutti i corsi per i quali è disponibile un gruppo seguendo le istruzioni di seguito (il bot NON è case sensitive, per cui potete scrivere come volete):

Desideri il link per i corsi di laurea triennale o magistrale? Usa il comando /triennale o /magistrale."
EOT;

} else {
	$database = json_decode(file_get_contents('database.json'), true);

	$command = $text;
	if(strlen($text) > 0 && $text{0} === '/') {
		$command = substr($text, 1);
	} else if(preg_match('#\d\d\w\w\w\w\w#', $text) === 1) {
		$textUpper = strtoupper($text);
		foreach($database as $key => $stuff) {
			if(isset($stuff['code'])) {
				if($textUpper === $stuff['code']) {
					$command = $key;
					break;
				} else if(is_array($stuff['code']) && isset($stuff['code'][$textUpper])) {
					$command = $key;
					break;
				}
			}
		}
		unset($textUpper);
	}

	if(isset($database[$command])) {
		$entry = $database[$command];
		if(isset($entry['groupname'])) {
			// È un elenco (e.g. /triennale)
			$response = "Bene, ecco una lista con i vari codici:\n";
			if(isset($entry['link'])) {
				// C'è un link al gruppo (e.g. sì in /triennale, no in /altro)
				$response .= "Link al gruppo generale (${entry['groupname']}): ${entry['link']}\n";
			}
			if(isset($entry['text'])) {
				// Se c'è testo libero a questo livello (e.g. /magistrale)
				$response .= implode("\n", $entry['text']);
			}
			if(isset($entry['sections'])) {
				// È diviso in sezioni (e.g. /aut)
				foreach($entry['sections'] as $section) {
					$response .= "\n${section['name']}\n";
					if(isset($section['text'])) {
						// Se c'è testo libero (e.g. /triennale -> Altri corsi)
						$response .= implode("\n", $section['text']);
					}
					if(isset($section['courses'])) {
						// Se c'è un elenco di corsi (e.g. dappertutto tranne /triennale -> Altri corsi)
						foreach($section['courses'] as $course) {
							$response .= printcourse($course, $database[$course]);
						}
					}
				}
			} else if(isset($entry['courses'])) {
				// C'è un solo elenco di corsi (e.g. /altro)
				foreach($entry['courses'] as $course) {
					$response .= printcourse($course, $database[$course]);
				}
			}
			// O se non c'è altro (e.g. /magistrale)
		} else {
			// È il nome di un corso
			if(isset($entry['wrap']) && $entry['wrap'] === false) {
				// Stampa così com'è (e.g. /changelog)
				$response = "${entry['name']}: ${entry['link']}";
			} else {
				// Stampa in quest'altra maniera (e.g. tutti i corsi)
				$course = printcourse(null, $entry, false);
				$response = "Link gruppo $course: " . $entry['link'];
			}
		}
	} else {
		$response = 'nn o kpt :(';
	}
}

$parameters = array('chat_id' => $chatId, 'text' => $response);
$parameters['method'] = 'sendMessage';
echo json_encode($parameters);
