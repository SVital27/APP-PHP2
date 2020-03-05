<?php
    class Etudiant{
        private $nom;
        private $prenom;
        private $code;
        private $nationalite;
        private $sexe;
        private $datedenais;
        private $tel;
        private $email;
        private $Type;

        public function __construct($code,$nom,$prenom,$nationalite, $sexe, $datedenais,$tel,$email,$Type)
        {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->code = $code;
            $this->nationalite = $nationalite;
            $this->sexe = $sexe;
            $this->datedenais = $datedenais;
            $this->tel= $tel;
            $this->email = $email;
            $this->Type = $Type;
            
        }


        public function getCode(){
            return $this->code;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getNationalite()
        {
            return $this->nationalite;
        }

        public function getSexe()
        {
            return $this->sexe;
        }

        public function getDatedenais()
        {
            return $this->datedenais;
        }

        public function getTel()
        {
            return $this->tel;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getType()
        {
            return $this->Type;
        }



       


    }




?>