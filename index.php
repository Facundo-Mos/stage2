<?php
// 1. Incluimos la conexión
require_once 'config.php';

// 2. Verificamos si se presionó el botón de guardar
if (isset($_POST['btn_guardar'])) {
    
    // 3. Capturamos y saneamos los datos (ejemplo con algunos campos)
    // Es recomendable usar sentencias preparadas para mayor seguridad
// Captura y limpieza de todos los campos del formulario
$data            = $conn->real_escape_string($_POST['data'] ?? '');
$titolo          = $conn->real_escape_string($_POST['titolo'] ?? '');
$codice          = $conn->real_escape_string($_POST['codice'] ?? '');
$cognome         = $conn->real_escape_string($_POST['cognome'] ?? '');
$nome            = $conn->real_escape_string($_POST['nome'] ?? '');
$nominativo      = $conn->real_escape_string($_POST['nominativo'] ?? '');
$indirizzo       = $conn->real_escape_string($_POST['indirizzo'] ?? '');
$cap             = $conn->real_escape_string($_POST['cap'] ?? '');
$citta           = $conn->real_escape_string($_POST['citta'] ?? '');
$provincia       = $conn->real_escape_string($_POST['provincia'] ?? '');
$nazione         = $conn->real_escape_string($_POST['nazione'] ?? '');
$sesso           = $conn->real_escape_string($_POST['sesso'] ?? '');
$data_nascita    = $conn->real_escape_string($_POST['data_nascita'] ?? '');
$eta             = (int)($_POST['eta'] ?? 0);
$citta_nascita   = $conn->real_escape_string($_POST['citta_nascita'] ?? '');
$codice_fiscale  = $conn->real_escape_string($_POST['codice_fiscale'] ?? '');
$partita_iva     = $conn->real_escape_string($_POST['partita_iva'] ?? '');
$cellulare1      = $conn->real_escape_string($_POST['cellulare1'] ?? '');
$cellulare2      = $conn->real_escape_string($_POST['cellulare2'] ?? '');
$telefono_casa   = $conn->real_escape_string($_POST['telefono_casa'] ?? '');
$telefono_lavoro = $conn->real_escape_string($_POST['telefono_lavoro'] ?? '');
$telefax         = $conn->real_escape_string($_POST['telefax'] ?? '');
$professione     = $conn->real_escape_string($_POST['professione'] ?? '');
$hobbies         = $conn->real_escape_string($_POST['hobbies'] ?? '');
$inviato_da      = $conn->real_escape_string($_POST['inviato_da'] ?? '');
$email           = $conn->real_escape_string($_POST['email'] ?? '');
$sito_web        = $conn->real_escape_string($_POST['sito_web'] ?? '');
$telefono_altro  = $conn->real_escape_string($_POST['telefono_altro'] ?? '');
$facebook        = $conn->real_escape_string($_POST['facebook'] ?? '');
$twitter         = $conn->real_escape_string($_POST['twitter'] ?? '');
$instagram       = $conn->real_escape_string($_POST['instagram'] ?? '');
$stato_civile    = $conn->real_escape_string($_POST['stato_civile'] ?? '');
$titolo_studio   = $conn->real_escape_string($_POST['titolo_studio'] ?? '');

// Campos de Gestión y Card
$card_attivo_gestione = $conn->real_escape_string($_POST['card_attivo_gestione'] ?? '');
$card_numero          = $conn->real_escape_string($_POST['card_numero'] ?? '');
$card_punti           = (int)($_POST['card_punti'] ?? 0);
$card_scadenza        = $conn->real_escape_string($_POST['card_scadenza'] ?? '');
$tesserato_il         = $conn->real_escape_string($_POST['tesserato_il'] ?? '');
$quota_tessera        = $conn->real_escape_string($_POST['quota_tessera'] ?? '');

// Privacidad (Checkboxes: suelen enviar 1 si están marcados)
$privacy_consenso_trattamento = isset($_POST['privacy_consenso_trattamento']) ? 1 : 0;
$privacy_consenso_marketing   = isset($_POST['privacy_consenso_marketing']) ? 1 : 0;
$privacy_consenso_sms         = isset($_POST['privacy_consenso_sms']) ? 1 : 0;
$privacy_consenso_email       = isset($_POST['privacy_consenso_email']) ? 1 : 0;
$privacy_consenso_posta       = isset($_POST['privacy_consenso_posta']) ? 1 : 0;
$privacy_consenso_invio_post   = isset($_POST['privacy_consenso_invio_post']) ? 1 : 0;
$privacy_data_consenso        = $conn->real_escape_string($_POST['privacy_data_consenso'] ?? '');
$privacy_documento_stampato   = $conn->real_escape_string($_POST['privacy_documento_stampato'] ?? '');

// Otros y Flags
$data_modifica      = date('Y-m-d');
$ora_modifica       = date('H:i:s');
$flag_is_cliente    = $conn->real_escape_string($_POST['flag_is_cliente'] ?? '0');
$note               = $conn->real_escape_string($_POST['note'] ?? '');
$libero1            = $conn->real_escape_string($_POST['libero1'] ?? '');
$libero2            = $conn->real_escape_string($_POST['libero2'] ?? '');
$flag_is_rinnovato  = $conn->real_escape_string($_POST['flag_is_rinnovato'] ?? '0');
$flag_is_new_non_rinnovato = $conn->real_escape_string($_POST['flag_is_new_non_rinnovato'] ?? '0');


//Consulta SQL
$sql = "INSERT INTO pazienti (
    data, titolo, codice, cognome, nome, nominativo, indirizzo, cap, citta, provincia, 
    nazione, sesso, data_nascita, eta, citta_nascita, codice_fiscale, partita_iva, 
    cellulare1, cellulare2, telefono_casa, telefono_lavoro, telefax, professione, 
    hobbies, inviato_da, email, sito_web, telefono_altro, facebook, twitter, 
    instagram, card_attivo_gestione, stato_civile, card_numero, titolo_studio, 
    card_punti, card_scadenza, privacy_consenso_trattamento, privacy_consenso_marketing, 
    privacy_consenso_sms, privacy_consenso_email, privacy_consenso_posta, 
    privacy_data_consenso, privacy_documento_stampato, tesserato_il, quota_tessera, 
    privacy_consenso_invio_post, data_modifica, ora_modifica, flag_is_cliente, 
    note, libero1, libero2, flag_is_rinnovato, flag_is_new_non_rinnovato
) VALUES (
    '$data', '$titolo', '$codice', '$cognome', '$nome', '$nominativo', '$indirizzo', '$cap', '$citta', '$provincia', 
    '$nazione', '$sesso', '$data_nascita', $eta, '$citta_nascita', '$codice_fiscale', '$partita_iva', 
    '$cellulare1', '$cellulare2', '$telefono_casa', '$telefono_lavoro', '$telefax', '$professione', 
    '$hobbies', '$inviato_da', '$email', '$sito_web', '$telefono_altro', '$facebook', '$twitter', 
    '$instagram', '$card_attivo_gestione', '$stato_civile', '$card_numero', '$titolo_studio', 
    $card_punti, '$card_scadenza', $privacy_consenso_trattamento, $privacy_consenso_marketing, 
    $privacy_consenso_sms, $privacy_consenso_email, $privacy_consenso_posta, 
    '$privacy_data_consenso', '$privacy_documento_stampato', '$tesserato_il', '$quota_tessera', 
    $privacy_consenso_invio_post, '$data_modifica', '$ora_modifica', '$flag_is_cliente', 
    '$note', '$libero1', '$libero2', '$flag_is_rinnovato', '$flag_is_new_non_rinnovato'
)";

// 2. Ejecutar la consulta y verificar errores
if ($conn->query($sql) === TRUE) {
    echo "<div class='alert alert-success mt-3'>Nuovo paziente registrato con successo!</div>";
} else {
    echo "<div class='alert alert-danger mt-3'>Errore durante il salvataggio: " . $conn->error . "</div>";
}

// 3. Cerrar la conexión (opcional, pero buena práctica)
$conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="sidebar shadow">
        <div class="logo-section text-center">
            <span class="material-symbols-outlined logo-icon text-info">clinical_notes</span>
        </div>

        <div class="nav-menu">
            <div class="nav-item active" onclick="showPage('dashboard', this)">
                <span class="material-symbols-outlined">dashboard</span> Dashboard
            </div>
            <div class="nav-item" onclick="showPage('pazienti', this)">
                <span class="material-symbols-outlined">group</span> Pazienti
            </div>
            <div class="nav-item" onclick="showPage('professionisti', this)">
                <span class="material-symbols-outlined">badge</span> Professionisti
            </div>
            <div class="nav-item" onclick="showPage('calendario', this)">
                <span class="material-symbols-outlined">calendar_month</span> Calendario
            </div>
        </div>
    </nav>
    <!-- primer parte del menu interactivo --> 
    <main class="main-content">
        
        <div id="dashboard" class="content-section">
            <div class="container bg-white p-5 shadow-sm rounded-4 text-center">
                <h1 class="display-5 fw-bold text-dark">Dashboard</h1>
                <p class="lead text-muted">Bienvenido al panel de control.</p>
            </div>
        </div>




        <!-- FORMULARIO DE PACIENTES -->
    
        <div id="pazienti" class="content-section d-none">
            <div class="container bg-white p-5 shadow-sm rounded-4">


                <h1 class="display-5 fw-bold text-primary mb-4">Gestión de Pacientes</h1>

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Aggiungi Nuovo Paciente</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="row g-3">
                        
                        <h5 class="border-bottom pb-2">Dati Anagrafici</h5>
                        <div class="col-md-2">
                            <label class="form-label">ID</label>
                            <input type="text" name="id" class="form-control" readonly placeholder="Auto">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Data Registrazione</label>
                            <input type="date" name="data" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Titolo</label>
                            <input type="text" name="titolo" class="form-control" placeholder="Esq, Dr, etc.">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Codice</label>
                            <input type="text" name="codice" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Cognome</label>
                            <input type="text" name="cognome" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nominativo (Ragione Sociale)</label>
                            <input type="text" name="nominativo" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Sesso</label>
                            <select name="sesso" class="form-select">
                                <option value="">Seleziona...</option>
                                <option value="M">Maschio</option>
                                <option value="F">Femmina</option>
                                <option value="Altro">Altro</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Data di Nascita</label>
                            <input type="date" name="data_nascita" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Età</label>
                            <input type="number" name="eta" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Città di Nascita</label>
                            <input type="text" name="citta_nascita" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Codice Fiscale</label>
                            <input type="text" name="codice_fiscale" class="form-control" maxlength="16">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Partita IVA</label>
                            <input type="text" name="partita_iva" class="form-control">
                        </div>

                        <h5 class="border-bottom pb-2 mt-4">Residenza e Domicilio</h5>
                        <div class="col-md-5">
                            <label class="form-label">Indirizzo</label>
                            <input type="text" name="indirizzo" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">CAP</label>
                            <input type="text" name="cap" class="form-control" maxlength="5">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Città</label>
                            <input type="text" name="citta" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <label class="form-label">Prov.</label>
                            <input type="text" name="provincia" class="form-control" maxlength="2">
                        </div>
                        <div class="col-md-1">
                            <label class="form-label">Nazione</label>
                            <input type="text" name="nazione" class="form-control" value="IT">
                        </div>

                        <h5 class="border-bottom pb-2 mt-4">Contatti e Social</h5>
                        <div class="col-md-3">
                            <label class="form-label">Cellulare 1</label>
                            <input type="text" name="cellulare1" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Cellulare 2</label>
                            <input type="text" name="cellulare2" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tel. Casa</label>
                            <input type="text" name="telefono_casa" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Tel. Lavoro</label>
                            <input type="text" name="telefono_lavoro" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sito Web</label>
                            <input type="url" name="sito_web" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" name="facebook" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Instagram</label>
                            <input type="text" name="instagram" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Twitter</label>
                            <input type="text" name="twitter" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Telefax / Altro</label>
                            <input type="text" name="telefax" class="form-control">
                        </div>

                        <h5 class="border-bottom pb-2 mt-4">Profilo e Membership</h5>
                        <div class="col-md-3">
                            <label class="form-label">Stato Civile</label>
                            <input type="text" name="stato_civile" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Professione</label>
                            <input type="text" name="professione" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Titolo Studio</label>
                            <input type="text" name="titolo_studio" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Inviato da</label>
                            <input type="text" name="inviato_da" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Hobbies</label>
                            <input type="text" name="hobbies" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Card Numero</label>
                            <input type="text" name="card_numero" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Card Punti</label>
                            <input type="number" name="card_punti" class="form-control" value="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Scadenza Card</label>
                            <input type="date" name="card_scadenza" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Quota Tessera</label>
                            <input type="text" name="quota_tessera" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Tesserato il</label>
                            <input type="date" name="tesserato_il" class="form-control">
                        </div>

                        <h5 class="border-bottom pb-2 mt-4">Privacy e Consensi</h5>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_trattamento" value="1">
                                <label class="form-check-label">Trattamento Dati</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_marketing" value="1">
                                <label class="form-check-label">Marketing</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_sms" value="1">
                                <label class="form-check-label">SMS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_email" value="1">
                                <label class="form-check-label">Email</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_posta" value="1">
                                <label class="form-check-label">Posta</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="privacy_consenso_invio_post" value="1">
                                <label class="form-check-label">Social Post</label>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Data Consenso Privacy</label>
                            <input type="date" name="privacy_data_consenso" class="form-control">
                        </div>
                        <div class="col-md-8 mt-2">
                            <label class="form-label">Documento Stampato</label>
                            <input type="text" name="privacy_documento_stampato" class="form-control">
                        </div>

                        <h5 class="border-bottom pb-2 mt-4">Gestione Interna</h5>
                        <div class="col-md-2">
                            <label class="form-label">Card Attivo</label>
                            <select name="card_attivo_gestione" class="form-select">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">È Cliente?</label>
                            <select name="flag_is_cliente" class="form-select">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Rinnovato</label>
                            <select name="flag_is_rinnovato" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Libero 1</label>
                            <input type="text" name="libero1" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Libero 2</label>
                            <input type="text" name="libero2" class="form-control">
                        </div>
                        
                        <div class="col-12">
                            <label class="form-label">Note</label>
                            <textarea name="note" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="reset" class="btn btn-secondary">Annulla</button>
                            <button type="submit" name="btn_guardar" class="btn btn-success">Salva Anagrafica</button>
                        </div>
                    </form>
                </div>
            </div>
    </main>
    <script src="button.js"></script>
</body>
</html>