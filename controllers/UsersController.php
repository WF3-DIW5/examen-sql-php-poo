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

            // Validation e-mail: vérification de l'unicité
            $userDb = User::find([
                ['email', '=', $_POST['email'] ]
            ]);


            // SI $userDb existe, alors l'e-mail n'est pas unique,
            // donc l'utilisateur existe, donc on redirige vers la page Login.
            if ($userDb)  {
                throw new Exception('Un utilisateur avec cette adresse existe déjà.');
            }
            // SINON : l'user n'existe pas, on peut créér l'utilisateur.
            else {

                // Comparaison de password et password_confirm
                if ($_POST['password'] === $_POST['password_confirm']) {

                    // Créer l'utilisateur :
                    $user = new User($_POST['pseudo'], $_POST['email'], $_POST['password']);
                    $user->save();


                    // Si mon user a bien été enregistré alors il a un ID (->save() retourne en effet un ID)
                    // Si c'est le cas je peux créer une session
                    if ( intval($user->id() ) > 0 ) {

                        // Session :
                        // On passe notre objet User en session afin d'y accéder de partout dans le code
                        $_SESSION['user'] = serialize($user);

                        // Maintenant que l'utilisateur est créé et la session créée, on 
                        // redirige vers la page d'accueil
                        Header('Location: ' . url('/'));
                    }

                    throw new Exception('Une erreur est survenue lors de la création de l`utilisateur.');

                }

                else { 
                    throw new Exception('Les mots de passe ne correspondent pas.');
                }


            }

        }


        view('users.signup');
    }

    /**
     * Login page
     */
    public function login() {

        if (!empty($_POST)) {
            
            //  vérifier que le User existe en BDD avec par exemple :

            $userDb = User::find([
                ['email', '=', $_POST['email']]
            ]);


            // SI l'utilisateur existe, alors il est logué :
            if ($userDb) {

                $userDb = $userDb[0];

                if (password_verify( $_POST['password'], $userDb->password() ) ) {

                    // Anti-brute-force
                    sleep(1);

                    // Session :
                    // On passe notre objet User en session afin d'y accéder de partout dans le code
                    $_SESSION['user'] = serialize($userDb);

                    // Maintenant que l'utilisateur est créé et la session créée, on 
                    // redirige vers la page d'accueil
                    Header('Location: ' . url('/'));

                }

                else {
                    throw new Exception('Les identifiants sont invalides.');
                }
            }

            else {
                throw new Exception('Les identifiants sont invalides.');
                //Header('Location: ' . url('signup'));
            }

        }
        view('users.login');

    }

    /**
     * Logout action
     */
    public function logout() {

        // On detruit la session de l'user avec session_destroy
        session_destroy();
        // Redirection vers la page d'accueil
        Header('Location: ' . url('/'));
    }

}