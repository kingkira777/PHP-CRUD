<?php
    require_once("../app.class.php");

    class Index extends App{

        public $lastname, $firstname, $dob;

        // DELETE USER 
        function Delete($id){
            $d = 'DELETE FROM users WHERE id = ?';
            $rd = $this->Connect()->prepare($d);
            $rd->execute([$id]);
            echo "deleted";
        }


        function Edit($id){
            $e = 'SELECT * FROM users WHERE id = ?';
            $re = $this->Connect()->prepare($e);
            $re->execute([$id]);
            $info = $re->fetch();
            echo json_encode($info);
        }

        //USER LIST 
        function List(){
            $g = 'SELECT * FROM users';
            $rg = $this->Connect()->prepare($g);
            $rg->execute();
            echo json_encode($rg->fetchAll());
        }


        // SAVE UPDATE USERS INFO
        function SaveUpdate($id){
            if(empty($id)){
                $s = 'INSERT INTO users(lastname, firstname, dob) 
                    VALUES(?, ? , ?)';
                $rs = $this->Connect()->prepare($s);
                $rs->execute([$this->lastname, $this->firstname, $this->dob]);
                echo "saved";
            }else{

                $u = 'UPDATE users SET lastname = :lname, firstname = :fname, dob = :dob    
                        WHERE id = :id';
                $ru = $this->Connect()->prepare($u);
                $ru->execute(array(
                    ':lname' => $this->lastname,
                    ':fname' => $this->firstname,
                    ':dob' => $this->dob,
                    ':id' => $id
                ));
                echo "updated";
            }
        }


    }



    $index = new Index();


    if(isset($_POST[""]) && !empty($_POST[""])){

    }

    if(isset($_POST["edituses"]) && !empty($_POST["edituses"])){
        $id = $_POST["id"];
        $index->Edit($id);
    }

    
    if(isset($_POST["deleteuser"]) && !empty($_POST["deleteuser"])){
        $id = $_POST["id"];
        $index->Delete($id);
    }


    if(isset($_POST["guserlist"]) && !empty($_POST["guserlist"])){
        $index->List();
    }
    
    if(isset($_POST["saveupdate"]) && !empty($_POST["saveupdate"])){
        $id = $_POST["id"];
        $formData = (!empty($_POST["formdata"]))? json_decode($_POST["formdata"]) : array();
        $index->lastname = $formData->lastname;
        $index->firstname = $formData->firstname;
        $index->dob = $formData->dob;
        $index->SaveUpdate($id);
    }

