<?php

class UsersController {

    /**
     * Signup page
     */
    public function signup() {

        /**
         * Traitements pour le cas de la route POST
         */
        if (!empty($_POST)) {
            var_dump($_POST);

            // TODO: Validation e-mail: vérification de l'unicité

            $userDb = User::findBy(['' => '']); // A remplir !

            // TODO: SI $userDb existe, alors l'e-mail n'est pas unique,
            // donc l'utilisateur existe, donc on redirige vers la page Login.
            if ($userDb) {
                // ...
            }
            // TODO: SINON : l'user n'existe pas, on peut créér l'utilisateur.
            else {
                // ...

                // TODO: Comparaison de password et password_confirm
                // if ( password == password_confirm) { 

                    // TODO: Créer l'utilisateur :
                    // $user = new User('a', 'b', 'c');
                    // $user->save();


                    // TODO: Session :

                    // On passe notre objet User en session afin d'y accéder de partout dans le code
                    // $_SESSION['user'] = $user;

                    // TODO: redirection

                    // Maintenant que l'utilisateur est créé et la session créée, on 
                    // redirige vers la page d'accueil

                    // -redirection à faire-


                // }
                // else { throw new Exception('...'); }


            }

        }


        view('users.signup');
    }

    /**
     * Login page
     */
    public function login() {

        if (!empty($_POST)) {
            
            // TODO: vérifier que le User existe en BDD avec par exemple :

            /* Db::find('User', [
                [
                    'email' => $_POST['email'],
                    'password_hash' => $_POST['password']
                ]
            ]); */

            // TODO: déporter cette requête dans le Model (qui est plus adapté car c'est le Model qui s'occupe des données)

            // SI l'utilisateur existe, alors il est logué :

            if ($userDb) {

                // TODO: passer en session l'User trouvé en DB
                // $_SESSION['user'] = $userDb;
            }

            else {
                // TODO: 
                    // soit : afficher des erreurs avec throw new Exception
                    // soit : rediriger vers la page d'inscription
            }

            // TODO: FACULTATIF
            // Si l'e-mail existe mais ne mot de passe n'est pas bon: afficher une erreur
            // Si l'e-mail n'existe pas, rediriger vers la page d'inscription

        }
        view('users.login');

    }

    /**
     * Logout action
     */
    public function logout() {

        // TODO: On detruit la session de l'user avec session_destroy

        // TODO: Redirection vers la page d'accueil

    }

}