<?php

class User extends Db {

    protected $id;
    protected $pseudo;
    protected $email;
    protected $password;
    protected $created_at;

    const TABLE_NAME = 'user';

    public function __construct(string $pseudo, string $email, string $password, int $id = null, string $created_at = null) {
        $this->setPseudo($pseudo);
        $this->setEmail($email);

        // Si j'ai un Id, c'est que je créée un objet User depuis la BDD
        // Donc j'ai besoin du MDP brut qui est en BDD (il est déjà hashé)
        if ($id !== null) {
            $this->password = $password;
        }
        // Sinon, c'est que je suis en train de créer un nouvel utilisateur
        // je ne passe donc dans le setter pour hasher le MDP
        else {
            $this->setPassword($password);
        }

        $this->setId($id);
        $this->setCreatedAt($created_at);
    }

    /**
     * Get the value of id
     */ 
    public function id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function pseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        if (strlen($pseudo) <= 3 ) {
            throw new Exception('pseudo trop court');
        }

        if (strlen($pseudo) >= 150) {
            throw new Exception('pseudo trop long');
        }

        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function email()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('email non valide');
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function createdAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function password()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        // TODO: FACULTATIF : valider le mot de passe
        // (pas trop court, avec des chars speciaux, maj + min ...)

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hash;

        return $this;
    }

    /**
     * Méthodes CRUD
     */

    
    /**
     * Recherche (SELECT) dans la table 'user'
     *
     * @param   array $request Array contenant 1+ arrays de type ['champ', 'operateur', 'valeur']
     *
     * @return User[]|false
     */
    public static function find(array $request) {

        $datas = Db::dbFind( self::TABLE_NAME, $request);


        if ( count($datas) > 0 ) {

            $users = [] ;

            foreach ($datas as $data) {

                $user = new User(
                    $data['pseudo'],
                    $data['email'],
                    $data['password_hash'],
                    intval($data['id'])
                );

                $users[] = $user;
            }

            return $users;

        }

        return false;

    }

    public function save() {

        $id = Db::dbCreate(self::TABLE_NAME, [
            'email' => $this->email(),
            'password_hash' => $this->password(),
            'pseudo' => $this->pseudo(),
        ]);

        $this->setId($id);

        return $this;
    }
}