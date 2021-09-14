<?php




/**
 * admin (id ,name ,email ,password)
 * 
 * Doctor (id ,name ,email ,password ,specialize ,gender)
 * 
 * patient (id ,name ,email ,password)
 * 
 * reservation (id ,DocId ,PId ,appointment ,confirmation)
 * 
 * Doctor      patient
 *   1           m
 *   m           1
 * ==================
 *   m          m
 * 
 * Doctor     reservation
 *  1             m
 *  1             1
 * ======================
 *  1              m
 * 
 * patient    reservation
 *   1             m
 *   1             1
 * ======================
 *   1              m
 * 
 */