<?php
ini_set('display_errors', "1");
ini_set('display_startup_errors', '1');

class Install {
    /**
     * Instancia de la clase SQLite3
     * @var \SQLite3
     */
    private $database;

    /**
     * Prefijo de las tablas de la base de datos eac2.db
     * @var string
     */
    private $prefix;

    public function __construct() {
        $this->database = new SQLite3(__DIR__ . "/database/eac2.db", SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE);
        $this->prefix = "";
    }

    /**
     * @param string $prefix Prefijo de las tabla de la base de datos.
     * @return void
     */
    public function setPrefix(string $prefix): void {
        $this->prefix = (string) $prefix;
    }

    /**
     * @return SQLite3Result | FALSE
     */
    private function createUser(): SQLite3Result | FALSE {
        $user = $this->database->prepare("
            CREATE TABLE $this->prefix" . "_user(
                nom TEXT NOT NULL PRIMARY KEY,
                password NOT NULL,
                admin BOOLEAN NOT NULL
            );
        ");

        return $user->execute();
    }

    /**
     * @return SQLite3Result | FALSE
     */
    private function createProductes(): SQLite3Result | FALSE {
        $productes = $this->database->prepare("CREATE TABLE $this->prefix" . "_productes(
            id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
            creador TEXT NOT NULL UNIQUE,
            producte TEXT NOT NULL,
            quantitat TEXT NOT NULL,
            comentaris TEXT NOT NULL,
            privat BOOLEAN NOT NULL,
            foreign key(creador) references $this->prefix" . "user(nom)
        )");

        return $productes->execute();
    }

    /**
     * @return SQLite3Result | FALSE
     */
    private function createConfig(): SQLite3Result | FALSE {
        $config = $this->database->prepare("CREATE TABLE $this->prefix" . "_config(
            nom TEXT NOT NULL PRIMARY KEY,
            valor TEXT NOT NULL
        )");
        
        return $config->execute();
    }

    /**
     * Inserta un nuevo en la base de datos.
     * @return SQLite3Result | FALSE
     */
    private function insertUser(): SQLite3Result | FALSE {
        $user = $this->database->prepare("INSERT INTO $this->prefix" . "_user (nom, password, admin) VALUES ('admin', '" . password_hash('admin', PASSWORD_BCRYPT). "', '1')");
        return $user->execute();
    }

    private function insertPrefix(): SQLite3Result | FALSE {
        $prefix = $this->database->prepare("INSERT INTO $this->prefix" . "_config(nom, valor) VALUES('$this->prefix', 'algo')");
        return $prefix->execute();
    }

    /**
     * Permite crear las tablas de la base de datos.
     * @return bool
     */
    public function tables(): bool {
        $user = $this->createUser();

        $productes = $this->createProductes();
        $config = $this->createConfig();

        $this->insertPrefix();
        return !!$user && !!$productes && !! $config;
    }

    public function post(string $inputName): string | FALSE {
        $value = "";

        if (array_key_exists($inputName, $_POST)) {
            $value = (string) $_POST[$inputName];
        }

        return $value;;
    }
}

/**
 * @var string Información de la creación de las tablas.
 */
$info = "";

if (array_key_exists("prefix", $_POST)) {
    $install = new Install;
    $prefix = $install->post("prefix");
    $install->setPrefix($prefix);

    $info = $install->tables()
        ? "<span 
        ass=\"info info-success\">Se creó existosamente las tablas de la base de datos</span>"
        : "<span class=\"info info-error\">Lamentable, no se pudieron crear las tablas</span>";

}

?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalador del proyecto EAC2</title>
</head>
<body>
    <main id="app">
        <div class="form-container">
            <form action="./?install" method="post" class="form">
                <label for="prefix">
                    <span>Prefijo para la tabla:</span>
                    <input type="text" name="prefix" id="prefix" required="required" />
                </label>

                <div class="group-button">
                    <button type="submit">Crear tablas</button>
                </div>
            </form>

            <div class="info-container"><?= $info; ?></div>
        </div>
    </main>
</body>
</html>
