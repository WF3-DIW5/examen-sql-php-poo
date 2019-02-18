<?php

class User extends Db {

    protected $id;
    protected $pseudo;
    protected $email;
    protected $password;
    protected $created_at;

    public function __construct(string $pseudo, string $email, string $password, $id = null) {
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setId($id);
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

        /** TODO: validation de l'e-mail */
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

        // TODO: on n'enregistre pas $password dans $this->password directement !
        // Il faut hasher le mot de passe en utilisant la fonction password_hash()
        $this->password = $password;

        return $this;
    }
}