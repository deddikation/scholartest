<?php

 /*
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */

 /**
  * Description of Vehicle
  *
  * @author Kabelo M
  */
 class Vehicle
       {
       private $type;
       private $vin;
       private $regNo;
       private $lrwt;
       private $nrwt;
       private $to;
       private $from;
       private $ass;
       private $dName;
       private $pdp;
       
       public function __construct($type,$vin,$regNo,$lrwt,$nrwt,$ass,$to,$from,$name,$pdp)
             {
             $this->type = $type;
             $this->vin = $vin;
             $this->dName = $name;
             $this->ass = $ass;
             $this->from = $from;
             $this->lrwt = $lrwt;
             $this->nrwt = $nrwt;
             $this->pdp = $pdp;
             $this->regNo = $regNo;
             $this->to = $to;
             }
             
       
             
       public function getType()
                   {
                   return $this->type;
                   }
                   
             public function getVIN()
                   {
                   return $this->vin;
                   }
                   
             public function getRegNo()
                   {
                   return $this->regNo;
                   }
                   
             public function getLRWT()
                   {
                   return $this->lrwt;
                   }
                   
             public function getNRWT()
                   {
                   return $this->nrwt;
                   }
                   
             public function getAssociation()
                   {
                   return $this->ass;
                   }
                   
             public function getTo()
                   {
                   return $this->to;
                   }
                   
             public function getFrom()
                   {
                   return $this->from;
                   }
                   
             public function getName()
                   {
                   return $this->dName;
                   }
                   
             public function getPDP()
                   {
                   return $this->pdp;
                   }
             
       }
 