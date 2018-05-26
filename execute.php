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
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';

//========================================================================================
//	START: Guida, triennale/magistrale (elenco corsi)
//========================================================================================

if($text == "/start") {
	$response = "Ciao $firstname, benvenuto/a!
Puoi utilizzare il bot in più modi:
-inserendo manualmente il codice dell'esame (ad esempio '18AULOA', senza apici),
-inserendo un'abbreviazione, ad esempio /apa.
Se vuoi un gruppo per parlare di qualsiasi cosa (cazzeggio), vai al /bar usando questo comando. ;)
Se hai bisogno del gruppo dei Rappresentanti degli Studenti, puoi trovarlo scrivendo `rappresentanti`, oppure tramite il comando /rappr.
Per un gruppo sulla compravendita di libri o appunti, parlatene su /libri, mentre se avete bisogno di ripetizioni, andaandate su /ripetizioni. Se sei alla ricerca di un gruppo generale sul tirocinio (triennale), usa subito il comando /tir, oppure scrivi semplicemente 'tirocinio'.
Ho anche creato un canale per chi vuole seguire i cambiamenti del bot (/changelog).

Non conoscete tutte le abbreviazioni o i codici? Nessun problema! Potete generare una lista di tutti i corsi per i quali è disponibile un gruppo seguendo le istruzioni di seguito (il bot NON è case sensitive, per cui potete scrivere come volete):


Desideri il link per i corsi di laurea triennale o magistrale? Usa il comando '/triennale' o '/magistrale', oppure scrivi semplicemente 'L' o 'LM'.";
}
elseif($text == "/triennale" || $text=="l") {
    $response = "Bene, ecco una lista con i vari codici:
Link al gruppo generale: https://t.me/IngInfTriennale

II ANNO
/apa - Algoritmi e Pogrammazione (03MNOOA)
/an2 - Analisi matematica II (23ACIOA)
/elt - Elettrotecnica (18AULOA)
/fis2 - Fisica II (03AXPOA)
/cae - Calcolatori Elettronici (12AGAOA)
/bda - Basi di Dati (14AFQOA)
/oop - Programmazione a Oggetti (09CBIOA)
/met - Metodi Matematici per l'Ingegneria (06BQXOA)

III ANNO
/sop - Sistemi Operativi (05CJCOA)
/stm - Sistemi Elettronici, Tecnologie e Misure (01QXVOA)
/reti - Reti di Calcolatori (12CDUOA)
/tes - Teoria ed Elaborazione dei Segnali (02MOOOA)
/cau - Controlli Automatici (18AKSOA)
/eapp - Elettronica Applicata (08ATIOA)

Visti i problemi con alcuni corsi in fase di spegnimento, potete trovare i link ai corsi necessari qui sotto:
SISTEMI E TECNOLOGIE ELETTRONICHE:
/ste - Sistemi e Tecnologie Elettroniche (10 crediti, Ingegneria Informatica) (01NVAOA)
TEORIA ED ELABORAZIONE DEI SEGNALI:
i) /ts2 - Teoria ed Elaborazione dei Segnali (10 crediti, Ingegneria Informatica) (01MOOOA)
ii) /tsc - Teoria dei Segnali e delle Comunicazioni (10 crediti, Ingegneria Elettronica) (01NVCNX)
ELETTRONICA APPLICATA E MISURE:
i) /eam - Elettronica Applicata e Misure (10 crediti, Ingegneria Informatica) (03MOAOA)
ii) /cir - Electronic Circuits (10 crediti, Ingegneria Elettronica/ECE) (02OIGNX)

CREDITI LIBERI
•iii anno:
/viq - Visualizzazione dell'Informazione Quantitativa (01QZNOA)
/nan - Introduzione alle Nanotecnologie (02JNUOA)
/lic - Laboratori di Internet e Comunicazioni (01QZDOA)
/ond - Onde coerenti: laser, olografia, teletrasporto (01POGOA)
/ott - Ottimizzazione per il Problem Solving (01QNKOA)
/amb - Ambient Intelligence (01QZPOA)
/rsc - Reti e sistemi complessi: fenomeni fisici e interazioni sociali (01QFXOA)

/inc - Inclusive design nelle scienze dell'architettura e dell'ingegneria (01SAMOA)
/lat - Sicurezza e legislazione dell'ambiente e del territorio (01NJAOA)


ENGLISH COURSES
YEAR 2
/engalg - Algorithms and Programming (02OGDLM)
/engcth - Circuit Theory (02OFZLM)
/engma2 - Mathematical Analysis II (03KXULM)
/engph2 - Physics II (02KXWLM)
/engarc - Computer Architectures (02KTMLM)
/engidb - Introduction to Databases (01RKWLM)
/engmme - Mathematical Methods (04LSILM)
/engoop - Object Oriented Programming (04JEYLM)

YEAR 3
/engnet - Computer Networks (05KSILM)
/engesm - Electronic Systems, Technologies and Measurements (01QXWLM)
/engoss - Operating Systems (04JEZLM)
/engsap - Signal Analysis and Processing (02OGGLM)
/engael - Applied Electronics (03MZGLM)
/engctr - Automatic Control (06LSLLM)
"
;
}
elseif($text == "/magistrale" || $text=="lm") {
    $response = "A quale indirizzo appartieni?
/aut - Automatica
/dat - Data Science
/emb - Embedded Systems
/mul - Grafica e Multimedia
/net - Reti
/soft - Software
/sds - Software e Sistemi Digitali
Se cerchi il link al gruppo generale per le magistrali, lo trovi qui: https://t.me/IngInfMagistrale";
}

//----------------------------------------------------------------------------------------
//	MAGISTRALI
//----------------------------------------------------------------------------------------

elseif($text == "/aut") {
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Automatica): https://t.me/joinchat/AWHhTURKgyOJ1D7d6WP2wg

I ANNO
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/mod - Modelli e Sistemi a Eventi Discreti (01NNEOV)
/copt - Convex Optimization and Engineering Applications (01OUWOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/nlc - Nonlinear Control and Aerospace Applications (01RKXOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)


II ANNO
/acs - Automotive Control Systems (03MIQOV)
i) /dct - Digital Control Technologies and Architectures (01PDCOV)
ii) /mdcs - Modern Design of Control Systems (01PDXOV)
iii) /saa - Software Architecture for Automation (01PECOV)
/rob - Robotica (04CFIOV)
/est - Estimation, Filtering, and System Identification (01RKYOV)";
}
elseif($text == "/dat") {
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Data Science): https://t.me/joinchat/AWHhTQ66iEgxxMnTFXqfjQ

I ANNO
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/isys - Information Systems (01PDWOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/bigd - Big Data: Architectures and Data Analytics (01QYDOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/dp1 - Programmazione Distribuita I (01NVWOV) - Distributed Programming I (03MQPOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)

II ANNO
/sic - Sicurezza dei Sistemi Informatici (03GSDOV) - Computer System Security (02KRQOV)
i) /dp2 - Distributed Programming II (01PDVOV)
ii) /iar - Intelligenza Artificiale (01BITOV)
i) /app - Applicazioni Internet (02JGROV)
ii) /swd - Interdisciplinary Software Design Project (01RMZOV)
iii) /mad -Mobile Application Development (01PFPOV)";
}
elseif($text == "/emb") {  
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Embedded Systems): https://t.me/joinchat/AWHhTUA7Khy9tYQA_5jOUw

I ANNO
/ees - Electronics for Embedded Systems (01NWMOV)
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/ose - Operating Systems for Embedded Systems (02NPSOV)
/spec - Specification and Simulation of Digital Systems (02LQDOV)
/mic - Microelectronic Systems (01NOYOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/sods - Synthesis and Optimization of Digital Systems (02NVNOV)

II ANNO
/ems - Energy Management in Mobile Systems (01QYOOV)
/mes - Modeling and Optimization of Embedded Systems (01NWNOV)
/soc - System-on-Chip Architecture (01QYHOV)
/tft - Testing and Fault Tolerance (01RKZOV)
/sdp - System Design Project (01RLAOV)";
}
elseif($text == "/mul") {  
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Grafica e Multimedia): https://t.me/joinchat/AWHhTUMvFkikgpfQKb6EtA

I ANNO
i) /dsp - Data Spaces (01RLPOV)
ii) /dct - Digital Control Technologies and Architectures (01PDCOV)
iii) /mod - Modelli e Sistemi a Eventi Discreti (01NNEOV)
iv) /mdcs - Modern Design of Control Systems (01PDXOV)
v) /oma - Optimization Methods and Algorithms (01OUVOV)
vi) /rob - Robotica (04CFIOV)
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/imul - Elaborazione e Trasmissione di Informazioni Multimediali (02GPJOV)
/infg - Informatica Grafica (02BHIOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)

II ANNO
i) /cvis - Computer Vision (04ISFOV)
ii) /ead - Elaborazione dell'Audio Digitale (01NWPOV)
iii) /rvir - Realtà Virtuale (02KVEOV)
/sic - Sicurezza dei Sistemi Informatici (03GSDOV) - Computer System Security (02KRQOV)
i) /can - Computer Animation (01NPZOV)
ii) /msp - Multimedia Signal Processing (01QFSOV)";
}
elseif($text == "/net") {
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Reti): https://t.me/joinchat/AWHhTUNZJ7XpXMpjoMOXXg

I ANNO
i) /dsp - Data Spaces (01RLPOV)
ii) /dct - Digital Control Technologies and Architectures (01PDCOV)
iii) /mod - Modelli e Sistemi a Eventi Discreti (01NNEOV)
iv) /mdcs - Modern Design of Control Systems (01PDXOV)
v) /oma - Optimization Methods and Algorithms (01OUVOV)
vi) /rob - Robotica (04CFIOV)
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/dp1 - Programmazione Distribuita I (01NVWOV) - Distributed Programming I (03MQPOV)
/prl - Progetto di Reti Locali (01NVYOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)

II ANNO
/dp2 - Distributed Programming II (01PDVOV)
/sic - Sicurezza dei Sistemi Informatici (03GSDOV) - Computer System Security (02KRQOV)
/par - Protocolli e Architetture di Routing (01NVZOV)
i) /app - Applicazioni Internet (02JGROV) 
ii) /imul - Elaborazione e Trasmissione di Informazioni Multimediali (02GPJOV)
iii) /mad -Mobile Application Development (01PFPOV)";
}
elseif($text == "/soft") {
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Software): https://t.me/joinchat/AWHhTUGPMG-KizTjRVAlzQ

I ANNO
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/oma - Optimization Methods and Algorithms (01OUVOV)
/lan - Formal Languages and Compilers (02JEUOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/dp1 - Programmazione Distribuita I (01NVWOV) - Distributed Programming I (03MQPOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)

II ANNO
/dp2 - Distributed Programming II (01PDVOV)
/sic - Sicurezza dei Sistemi Informatici (03GSDOV) - Computer System Security (02KRQOV)    
i) /iar - Intelligenza Artificiale (01BITOV)
ii) /app - Applicazioni Internet (02JGROV) 
iii) /imul - Elaborazione e Trasmissione di Informazioni Multimediali (02GPJOV)
iv) /swd - Interdisciplinary Software Design Project (01RMZOV)
v) /mad -Mobile Application Development (01PFPOV)";
}
elseif($text == "/sds") {
    $response = "Bene, ecco una lista con i vari codici:
Link gruppo principale (LM Software e Sistemi Digitali): https://t.me/joinchat/AWHhTUG4UmF1GKZlQMS-2A

I ANNO
/ase - Architetture dei Sistemi di Elaborazione (02GOLOV) - Computer Architectures (02LSEOV)
/dms - Sistemi per la Gestione di Basi di Dati (01NVUOV) - Database Management Systems (01NVVOV)
/tsr - Tecnologie e Servizi di Rete (02KPNOV) - Computer Network Technologies and Services (01OTWOV)
/spec - Specification and Simulation of Digital Systems (02LQDOV)
/swe - Ingegneria del Software (05BIDOV) - Software Engineering (04GSPOV)
/dp1 - Programmazione Distribuita I (01NVWOV) - Distributed Programming I (03MQPOV)
/pst - Programmazione di Sistema (02GRSOV) - System and Device Programming (01NYHOV)
/sods - Synthesis and Optimization of Digital Systems (02NVNOV)

II ANNO
/dp2 - Distributed Programming II (01PDVOV)
i) /dsp - Data Spaces (01RLPOV)
ii) /dct - Digital Control Technologies and Architectures (01PDCOV)
iii) /mod - Modelli e Sistemi a Eventi Discreti (01NNEOV)
iv) /mdcs - Modern Design of Control Systems (01PDXOV)
v) /oma - Optimization Methods and Algorithms (01OUVOV)
vi) /rob - Robotica (04CFIOV)
/sic - Sicurezza dei Sistemi Informatici (03GSDOV) - Computer System Security (02KRQOV)
i) /ems - Energy Management in Mobile Systems (01QYOOV)
ii) /iar - Intelligenza Artificiale (01BITOV)
iii) /soc - System-on-Chip Architecture (01QYHOV)
iv) /mad - Mobile Application Development (01PFPOV) 
v) /sdp - System Design Project (01RLAOV)";
}

//----------------------------------------------------------------------------------------
//	CORSI TRIENNALE II ANNO
//----------------------------------------------------------------------------------------

elseif($text == "/apa" || $text=="03mnooa") {
	$response = "Link gruppo Algoritmi e Programmazione: https://t.me/joinchat/AAAAAEHJKLIFYe4H8DyAsw";
}
elseif($text == "/elt" || $text=="18auloa") {
	$response = "Link gruppo Elettrotecnica: https://t.me/joinchat/AAAAAD9BpcnchBLUEnioVQ";
}
elseif($text == "/cae" || $text=="12agaoa") {
	$response = "Link gruppo Calcolatori Elettronici: https://t.me/joinchat/AAAAAEJuFpWQh_MlqR-dqQ";
}
elseif($text == "/an2" || $text=="23acioa") {
	$response = "Link gruppo Analisi II: https://t.me/joinchat/AAAAAD-5K7MDuHb7okBIrw";
}
elseif($text == "/met" || $text=="06bqxoa") {
	$response = "Link gruppo Metodi Matematici per l'Ingegneria: https://t.me/joinchat/AAAAAEB7eu7kwNY1flGUTw";
}
elseif($text == "/fis2" || $text=="03axpoa") {
	$response = "Link gruppo Fisica II: https://t.me/joinchat/AAAAAEI4s2zTMZiN55Ccuw";
}
elseif($text == "/bda" || $text=="14afqoa") {
	$response = "Link gruppo Basi di Dati: https://t.me/joinchat/AWHhTUKBnKp-ImghkayQUw";
}
elseif($text == "/oop" || $text=="09cbioa") {
	$response = "Link gruppo Programmazione a Oggetti: https://t.me/joinchat/AWHhTUGhuCoTqgsfyEMRpQ";
}

//----------------------------------------------------------------------------------------
//	CORSI TRIENNALE III ANNO
//----------------------------------------------------------------------------------------

elseif($text == "/eapp" || $text=="08atioa") {
	$response = "Link gruppo Elettronica Applicata: https://t.me/joinchat/AWHhTUJ1hBm_rp8qI0EJAA";
}
elseif($text == "/eam" || $text=="03moaoa") {
	$response = "Link gruppo Elettronica Applicata e Misure (corso da 10 crediti): https://t.me/joinchat/AWHhTT5FCYe0hB6IUJXoZw";
}
elseif($text == "/cir" || $text=="02oignx") {
	$response = "Link gruppo Electronic Circuits (corso da 10 crediti, Ingegneria Elettronica/ECE): https://t.me/joinchat/AWHhTURqgvY3Gp3VivBfgA";
}
elseif($text == "/sop" || $text=="05cjcoa") {
	$response = "Link gruppo Sistemi Operativi: https://t.me/joinchat/AWHhTT-Vihh0I05WwX1Aaw";
}
elseif($text == "/reti" || $text=="12cduoa") {
	$response = "Link gruppo Reti di Calcolatori: https://t.me/joinchat/AWHhTUBMQiRlNy8eoYtNew";
}
elseif($text == "/tes" || $text=="02moooa") {
	$response = "Link gruppo Teoria ed Elaborazione dei Segnali: https://t.me/joinchat/AWHhTUPuGqC7DZATBQZnrw";
}
elseif($text == "/cau" || $text=="18aksoa") {
	$response = "Link gruppo Controlli Automatici: https://t.me/joinchat/AWHhTUGegJC71E_pLMloJg";
}
elseif($text == "/stm" || $text=="01qxvoa") {
	$response = "Link gruppo Sistemi Elettronici, Tecnologie e Misure: https://t.me/joinchat/AWHhTULsNdVmOVv2H9cphQ";
}

	//························································································
	//	CORSI TRIENNALE IN FASE DI SPEGNIMENTO (OPPURE NON DI ING. INF) (III ANNO)
	//························································································
	
	elseif($text == "/ste" || $text=="01nvaoa")
	{
		$response = "Link gruppo Sistemi e Tecnologie Elettroniche: https://t.me/joinchat/AAAAAD__AD2-iXQW1EBuZQ";
	}
	elseif($text == "/ts2" || $text=="01moooa")
	{	
		$response = "Link gruppo Teoria ed Elaborazione dei Segnali (corso da 10 crediti): https://t.me/joinchat/AWHhTUDvj28xdfBC9PDzNw";
	}
	elseif($text == "/tsc" || $text=="01nvcnx")
	{
		$response = "Link gruppo Teoria dei Segnali e delle Comunicazioni (corso da 10 crediti, Ingegneria Elettronica): https://t.me/joinchat/AWHhTUNm_uMTfFJYSO7phw";
	}

//----------------------------------------------------------------------------------------
//	CORSI TRIENNALE (INGLESE)
//----------------------------------------------------------------------------------------

elseif($text == "/engalg" || $text=="02ogdlm") {
	$response = "Link to the group Algorithms and Programming: https://t.me/joinchat/AWHhTVDwMJ5Oq8OUqALwyA";
}
elseif($text == "/engcth" || $text=="02ofzlm") {
	$response = "Link to the group Circuit Theory: https://t.me/joinchat/AWHhTVJERkuPvOnuP0DKNw";
}
elseif($text == "/engma2" || $text=="03kxulm") {
	$response = "Link to the group Mathematical Analysis II: https://t.me/joinchat/AWHhTUR8n0FbqRdLI1Fvbw";
}
elseif($text == "/engph2" || $text=="02kxwlm") {
	$response = "Link to the group Physics II: https://t.me/joinchat/AWHhTUYr6p2tvvJYVL84Iw";
}
elseif($text == "/engarc" || $text=="02ktmlm") {
        $response = "Link to the group Computer Architectures: https://t.me/joinchat/AWHhTUikUB8uHnGM7OXCIg";
}
elseif($text == "/engidb" || $text=="01rkwlm") {
        $response = "Link to the group Introduction to Databases: https://t.me/joinchat/AWHhTVF7uJ9ZfhiZLuMmJw";
}
elseif($text == "/engmme" || $text=="04lsilm") {
        $response = "Link to the group Mathematical Methods: https://t.me/joinchat/AWHhTULOFNQ5AGfoufhduA";
}
elseif($text == "/engoop" || $text=="04jeylm") {
        $response = "Link to the group Object Oriented Programming: https://t.me/joinchat/AWHhTUyb9a4zv2wpKCbkfA";
}

elseif($text == "/engnet" || $text=="05ksilm") {
        $response = "Link to the group Computer Networks: https://t.me/joinchat/AWHhTUomL7dw-oQ5Ll9rwA";
}
elseif($text == "/engesm" || $text=="01qxwlm") {
        $response = "Link to the group Electronic Systems, Technologies and Measurements: https://t.me/joinchat/AWHhTUlTn2711XWBDvfTew";
}
elseif($text == "/engoss" || $text=="04jezlm") {
        $response = "Link to the group Operting Systems: https://t.me/joinchat/AWHhTVKjMNLLRymIk6BkPQ";
}
elseif($text == "/engsap" || $text=="04jezlm") {
        $response = "Link to the group Signal Analysis and Processing: https://t.me/joinchat/AWHhTVGAuGeF-ysnlluRog";
}
elseif($text == "/engael" || $text=="03mzglm") {
        $response = "Link to the group Applied Electronics: https://t.me/joinchat/AWHhTUXy03Z2hB6ptas5eA";
}
elseif($text == "/engctr" || $text=="06lsllm") {
        $response = "Link to the group Automatic Control: https://t.me/joinchat/AWHhTUu7VarTVqlRt6sNnA";
}















//----------------------------------------------------------------------------------------
//	CORSI MAGISTRALE
//----------------------------------------------------------------------------------------

	
elseif($text == "/ase" || $text=="02golov" || $text=="02lseov") {
	$response = "Link gruppo Architetture dei Sistemi di Elaborazione - Computer architectures: https://t.me/joinchat/AWHhTURjlmKrmEATdPn9pw";
}
elseif($text == "/dms" || $text=="01nvvov" || $text=="01nvuov") {
	$response = "Link gruppo Sistemi per la Gestione di Basi di Dati - Database Management Systems: https://t.me/joinchat/AWHhTUPmlkk3NGwiyBwH3g";
}
elseif($text == "/tsr" || $text=="02kpnov" || $text=="01otwov") {
	$response = "Link gruppo Tecnologie e Servizi di Rete - Computer Network Technologies and Services: https://t.me/joinchat/AWHhTUMRFDzAiBNEDwB22Q";
}
elseif($text == "/mod" || $text=="01nneov") {
	$response = "Link gruppo Modelli e Sistemi a Eventi Discreti: https://t.me/joinchat/AWHhTUPsL97g4IGggoJFig";
}
elseif($text == "/copt" || $text=="01ouwov") {
	$response = "Link gruppo Convex Optimization and Engineering Applications: https://t.me/joinchat/AWHhTUIrWgfwr2Y4NBWaJw";
}
elseif($text == "/swe" || $text=="05bidov" || $text=="04gspov") {
	$response = "Link gruppo Ingegneria del Software - Software Engineering: https://t.me/joinchat/AWHhTUO1VW4d5BI_bfVVZg";
}
elseif($text == "/nlc" || $text=="01rkxov") {
	$response = "Link gruppo Nonlinear Control and Aerospace Applications: https://t.me/joinchat/AWHhTUPY8S9IzWMk495LUA";
}
elseif($text == "/pst" || $text=="02grsov" || $text=="01nyhov") {
	$response = "Link gruppo Programmazione di Sistema - System and Device Programming: https://t.me/joinchat/AWHhTUKL2mCjq7SyuVbD8Q";
}
elseif($text == "/acs" || $text=="03miqov") {
	$response = "Link gruppo Automotive Control Systems: https://t.me/joinchat/AWHhTUM7AuEWZNDdRvK96w";
}
elseif($text == "/rob" || $text=="04cfiov") {
	$response = "Link gruppo Robotica: https://t.me/joinchat/AWHhTUQGYLLB3lSuCnl3qw";
}
elseif($text == "/est" || $text=="01rkyov") {
	$response = "Link gruppo Estimation, Filtering, and System Identification: https://t.me/joinchat/AWHhTUPAZsjQq21kQd9fxQ";
}
elseif($text == "/dct" || $text=="01pdcov") {
	$response = "Link gruppo Digital Control Technologies and Architectures: https://t.me/joinchat/AWHhTULlHt-cjohj2ANC6w";
}
elseif($text == "/mdcs" || $text=="01pdxov") {
	$response = "Link gruppo Modern Design of Control Systems: https://t.me/joinchat/AWHhTUNB66W58CJ88Rss7Q";
}
elseif($text == "/saa" || $text=="01pecov") {
	$response = "Link gruppo Software Architecture for Automation: https://t.me/joinchat/AWHhTUNj9WyIn4kAlZFtBQ";
}
elseif($text == "/isys" || $text=="01pdwov") {
	$response = "Link gruppo Information Systems: https://t.me/joinchat/AWHhTUPpBagsQUS0H-6mBw";
}
elseif($text == "/bigd" || $text=="01qydov") {
	$response = "Link gruppo Big Data: Architectures and Data Analytics: https://t.me/joinchat/AWHhTUNOnQuT93-l4Tot9g";
}
elseif($text == "/dp1" || $text=="03mqpov" || $text=="01nvwov") {
	$response = "Link gruppo Programmazione Distribuita I - Distributed Programming I: https://t.me/joinchat/AWHhTQxBVpvTQutrKIG8hQ";
}
elseif($text == "/sic" || $text=="03gsdov" || $text=="02krqov") {
	$response = "Link gruppo Sicurezza dei Sistemi Informatici - Computer System Security: https://t.me/joinchat/AWHhTQt5GdlO5P8RLvAyCw";
}
elseif($text == "/dp2" || $text=="01pdvov") {
	$response = "Link gruppo Distributed Programming II: https://t.me/joinchat/AWHhTUNK_dNO4V18B6Kvaw";
}
elseif($text == "/iar" || $text=="01bitov") {
	$response = "Link gruppo Intelligenza Artificiale: https://t.me/joinchat/AWHhTUN4agtRqrzYqvL77Q";
}
elseif($text == "/app" || $text=="02jgrov") {
	$response = "Link gruppo Applicazioni Internet: https://t.me/joinchat/AWHhTUJzjk5k6B1b9zE8GQ";
}
elseif($text == "/swd" || $text=="01rmzov") {
	$response = "Link gruppo Interdisciplinary Software Design Project: https://t.me/joinchat/AWHhTUK9dabZaLd9z0GJfQ";
}
elseif($text == "/mad" || $text=="01pfpov") {
	$response = "Link gruppo Mobile Application Development: https://t.me/joinchat/AWHhTUEP8ias1fCdcUWEbw";
}
elseif($text == "/ees" || $text=="01nwmov") {
	$response = "Link gruppo Electronics for Embedded Systems: https://t.me/joinchat/AWHhTUSA4kL-LtGmh7tsqw";
}
elseif($text == "/ose" || $text=="02npsov") {
	$response = "Link gruppo Operating Systems for Embedded Systems: https://t.me/joinchat/AWHhTUMWVK4q7DlUXSsxfQ";
}
elseif($text == "/spec" || $text=="02lqdov") {
	$response = "Link gruppo Specification and Simulation of Digital Systems: https://t.me/joinchat/AWHhTUBs2ugzzYBlG01O5A";
}
elseif($text == "/mic" || $text=="01noyov") {
	$response = "Link gruppo Microelectronic Systems: https://t.me/joinchat/AWHhTUHR0ZM2x4lyKOB41A";
}
elseif($text == "/sods" || $text=="02nvnov") {
	$response = "Link gruppo Synthesis and Optimization of Digital Systems: https://t.me/joinchat/AWHhTUJPnnzxDxG_0os8fg";
}
elseif($text == "/ems" || $text=="01qyoov") {
	$response = "Link gruppo Energy Management in Mobile Systems: https://t.me/joinchat/AWHhTQvbYx1vIZWd5Hk3cg";
}
elseif($text == "/mes" || $text=="01nwnov") {
	$response = "Link gruppo Modeling and Optimization of Embedded Systems: https://t.me/joinchat/AWHhTUMrdejsGdpiuSU-4Q";
}
elseif($text == "/soc" || $text=="01qyhov") {
	$response = "Link gruppo System-on-Chip Architecture: https://t.me/joinchat/AWHhTUPjFmWgcVoKZZ1MCA";
}
elseif($text == "/tft" || $text=="01rkzov") {
	$response = "Link gruppo Testing and Fault Tolerance: https://t.me/joinchat/AWHhTURP9ddxzHfkAuIwKg";
}
elseif($text == "/sdp" || $text=="01rlaov") {
	$response = "Link gruppo System Design Project: https://t.me/joinchat/AWHhTUFbpvyBXrVK-IYtZg";
}
elseif($text == "/imul" || $text=="02gpjov") {
	$response = "Link gruppo Elaborazione e Trasmissione di Informazioni Multimediali: https://t.me/joinchat/AWHhTUO9HK87c9lIbGDLQg";
}
elseif($text == "/infg" || $text=="02bhiov") {
	$response = "Link gruppo Informatica Grafica: https://t.me/joinchat/AWHhTUPaE0q_oPS6kbM7YQ";
}
elseif($text == "/can" || $text=="01npzov") {
	$response = "Link gruppo Computer Animation: https://t.me/joinchat/AWHhTUL8DASAciXmc5HwMA";
}
elseif($text == "/msp" || $text=="01npzov") {
	$response = "Link gruppo Multimedia Signal Processing: https://t.me/joinchat/AWHhTT75pIwnjSInCfbq0w";
}
elseif($text == "/dsp" || $text=="01rlpov") {
	$response = "Link gruppo Data Spaces: https://t.me/joinchat/AWHhTUKeSQsTFCzr5kmXgw";
}
elseif($text == "/oma" || $text=="01ouvov") {
	$response = "Link gruppo Optimization Methods and Algorithms: https://t.me/joinchat/AWHhTUJDrXyZ-e7HPTpCwQ";
}
elseif($text == "/cvis" || $text=="04isfov") {
	$response = "Link gruppo Computer Vision: https://t.me/joinchat/AWHhTUNOjVKUWjusEKYi5A";
}
elseif($text == "/ead" || $text=="01nwpov") {
	$response = "Link gruppo Elaborazione dell'Audio Digitale: https://t.me/joinchat/AWHhTQt7_AggPc9VohR6HA";
}
elseif($text == "/rvir" || $text=="02kveov") {
	$response = "Link gruppo Realtà virtuale: https://t.me/joinchat/AWHhTUJJ6SFtoPh6w2BAJA";
}
elseif($text == "/prl" || $text=="01nvyov") {
	$response = "Link gruppo Progetto di Reti Locali: https://t.me/joinchat/AWHhTUQ1ZNHIYYOQQvL-lQ";
}
elseif($text == "/par" || $text=="01nvzov") {
	$response = "Link gruppo Protocolli e Architetture di Routing: https://t.me/joinchat/AWHhTUJh9tnkVhYIR8dNag";
}
elseif($text == "/lan" || $text=="02jeuov") {
	$response = "Link gruppo Formal Languages and Compilers: https://t.me/joinchat/AWHhTUGmiW2ivq1_vYj9AA";
}

//----------------------------------------------------------------------------------------
//	CREDITI LIBERI DEL III ANNO (CONSIGLIATI DAL CORSO DI STUDI)
//----------------------------------------------------------------------------------------

elseif($text == "/nan" || $text=="02jnuoa") {
   $response = "Link gruppo Introduzione alle Nanotecnologie: https://t.me/joinchat/AWHhTUvhWxmxwYidlgB-ww";
}
elseif($text == "/lic" || $text=="01qzdoa") {
   $response = "Link gruppo Laboratori di Internet e Comunicazioni: https://t.me/joinchat/AWHhTUpJkSBVrP2afTm4rA";
}
elseif($text == "/ond" || $text=="01pogoa") {
   $response = "Link gruppo Onde coerenti: laser, olografia, teletrasporto: https://t.me/joinchat/AWHhTUYqi5f1IIC2K3CDkg";
}
elseif($text == "/ott" || $text=="01qnkoa") {
   $response = "Link gruppo Ottimizzazione per il Problem Solving: https://t.me/joinchat/AWHhTUolQqSpo0QxI-s0dA";
}
elseif($text == "/amb" || $text=="01qzpoa") {
   $response = "Link gruppo Ambient Intelligence: https://t.me/joinchat/AWHhTUTOaRH7MHjsO5xaSA";
}
elseif($text == "/rsc" || $text=="01qfxoa") {
   $response = "Link gruppo Reti e sistemi complessi: fenomeni fisici e interazioni sociali: https://t.me/joinchat/AWHhTVJfjtrH3pgFmalv0g";
}
elseif($text == "/viq" || $text=="01qznoa") {
   $response = "Link gruppo Visualizzazione dell'Informazione Quantitativa: https://t.me/joinchat/AWHhTVL6TpOspoLCUzP4WA";
}

//----------------------------------------------------------------------------------------
//	CREDITI LIBERI DEL III ANNO (NON CONSIGLIATI DAL CORSO DI STUDI)
//----------------------------------------------------------------------------------------

elseif($text == "/inc" || $text=="01samoa") {
   $response = "Link gruppo Inclusive design nelle scienze dell'architettura e dell'ingegneria: https://t.me/joinchat/AWHhTUa2xfmNY-UNyxgMVA";
}
elseif($text == "/lat" || $text=="01njaoa") {
   $response = "Link gruppo Sicurezza e legislazione dell'ambiente e del territorio: https://t.me/joinchat/AWHhTVJ5F_4oRtNhHwkCSw";
}

//----------------------------------------------------------------------------------------
//	ALTRI GRUPPI (BAR, RAPPRESENTANTI, TIROCINIO)
//----------------------------------------------------------------------------------------

elseif($text == "/bar" || $text=="cazzeggio") {
	$response = "Link gruppo Bar Corinto: https://t.me/joinchat/AWHhTT7puKoVi_n-L43e1A";
}
elseif($text == "/rappr" || $text=="rappresentanti") {
	$response = "Link gruppo per segnalazioni ai Rappresentanti degli Studenti di Ingegneria Informatica: https://t.me/joinchat/AAAAAEQPNY4huYYBbDOcLQ";
}
elseif($text == "/tir" || $text=="tirocinio") {
	$response = "Link gruppo Tirocinio (triennale): https://t.me/joinchat/ArB62At04ai_qE0UWvXbxQ";
}
elseif($text == "/libri" || $text=="libri") {
	$response = "Link gruppo compravendita libri e appunti: https://t.me/joinchat/AWHhTUmEZ0LiDxFNxK2dEA";
}
elseif($text == "/ripetizioni" || $text=="ripetizioni") {
	$response = "Link gruppo cerco o offro ripetizioni: https://t.me/joinchat/AWHhTUMgrCpThX8coTPN6g";
}
elseif($text == "/changelog" || $text=="changelog") {
	$response = "Link canale per aggiornamenti sul bot: https://t.me/joinchat/AAAAAEfq4quRqMjvfLiMAg";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
