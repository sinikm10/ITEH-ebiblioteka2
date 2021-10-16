<?php
class Database
{
    /** @var Mysqli $connection */
    private $connection;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connection = new Mysqli('localhost','root','','ebiblioteka');
        $this->connection->set_charset("utf8");

        if($this->connection->connect_errno) {
            die('Neuspela konekcija na bazu!');
        }
    }

    public function vratiZanrove()
    {
        $upit = "SELECT * FROM zanr" ;
        $rez = $this->connection->query($upit);
        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function vratiKnjige($sort)
    {
        $upit = "SELECT * FROM knjiga k join zanr z on k.zanrID = z.zanrID ORDER BY k.nazivKnjige " . $sort ;
        $rez = $this->connection->query($upit);

        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function pretragaKnjiga($naziv,$nezaduzene)
    {
        $upit = "SELECT * FROM knjiga k join zanr z on k.zanrID = z.zanrID WHERE k.nazivKnjige LIKE '%" . $naziv . "%' " ;
        if($nezaduzene){
            $upit .= " AND k.knjigaID NOT IN (SELECT knjigaID from zaduzenje WHERE datumRazduzenja IS NULL)";
        }
        $rez = $this->connection->query($upit);
        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function login($ime, $lozinka)
    {
        $ime = $this->connection->real_escape_string($ime);
        $lozinka = $this->connection->real_escape_string($lozinka);

        $upit = "SELECT * FROM bibliotekar WHERE username = '".$ime ."' AND password = '". $lozinka ."' LIMIT 1";
        $rez = $this->connection->query($upit);

        while ($r = $rez->fetch_object()){
            return $r;
        }

        return null;
    }

    public function vratiClanove()
    {
        $upit = "SELECT * FROM clan";
        $rez = $this->connection->query($upit);

        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function zaduzi($knjigaID, $clanID)
    {
        $upit = "INSERT INTO zaduzenje(knjigaID,clanID) VALUES($knjigaID,$clanID)";
        return $this->connection->query($upit);
    }

    public function razduzi($zaduzenjeID)
    {
        $upit = "UPDATE zaduzenje SET datumRazduzenja = NOW() WHERE id = " .$zaduzenjeID;
        return $this->connection->query($upit);
    }

    public function vratiZaduzenja()
    {
        $upit = "SELECT * FROM zaduzenje z join knjiga k on z.knjigaID = k.knjigaID join clan c on z.clanID = c.clanID where z.datumRazduzenja IS NULL";
        $rez = $this->connection->query($upit);

        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function vratiSvaZaduzenja()
    {
        $upit = "SELECT * FROM zaduzenje z join knjiga k on z.knjigaID = k.knjigaID join clan c on z.clanID = c.clanID ";
        $rez = $this->connection->query($upit);

        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function obrisi($id)
    {
        $upit = "DELETE FROM zaduzenje where id = " .$id;
        return $this->connection->query($upit);
    }

    public function unesiKnjigu($naziv, $autor, $zanr)
    {
        $upit = "INSERT INTO knjiga(nazivKnjige,autorKnjige,zanrID) VALUES('$naziv','$autor',$zanr)";
        return $this->connection->query($upit);
    }

    public function podaciZaGrafik()
    {
        $upit = "SELECT z.nazivZanra, count(k.knjigaID) as broj FROM knjiga k join zanr z on k.zanrID = z.zanrID GROUP BY k.zanrID "  ;
        $rez = $this->connection->query($upit);

        $niz = [];
        while ($r = $rez->fetch_object()){
            $niz[] = $r;
        }

        return $niz;
    }

    public function Unesiclana( $Ime, $Adresa,  $Email, $Kontakt)
    {
        $upit = "INSERT INTO clan VALUES (null, '$Ime', '$Adresa','$Kontakt','$Email' )";
        return $this->connection->query($upit);

    }
}