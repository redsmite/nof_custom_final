<?php

    
    create database db_final;
    
    
    create table IF NOT EXISTS verification(
         id integer not null auto_increment,
         acc_id integer not null,
         code varchar(100),
         token text,
        
        primary key(id)
        
    );
    
    create table IF NOT EXISTS tbl_accs(
        id integer not null auto_increment,
        type char(1) not null, /*1 = client , 2 = admin*/
        fname varchar(100) not null ,
        lname varchar(100) not null ,
        gender char(1) , /* M  / F*/
        email varchar(100) , 
        contact varchar(100),
        address text ,
        username varchar(100),
        password varchar(255),
        profile_pic text,
        status char(1)  , /*1 if not validated 2 if validated*/
        primary key(id)
    );
    
    
    create table IF NOT EXISTS tbl_parts(
        id integer not null auto_increment,
        part_type char(1),/*Neck wood , bodywood , heads*/
        part_name varchar(100),
        thickness varchar(100),
        description text ,
        image text,
        price decimal,
        
        primary key(id)
    );
    
    create table IF NOT EXISTS guitar_builder(
        id integer not null auto_increment,
        head_id integer not null,
        neck_id integer not null,
        body_id integer not null,
        amount decimal,
        primary key (id)
    );
    
    create table if not exists guitar_orders(
        id integer not null auto_increment,
        guitar_id integer not null ,
        client_id integer not null,
        amount decimal,
        payment_type char(1),
        status char(1),
        date_ordered datetime default now(),
        
        primary key (id)
    );
    
    create table if not exists guitar_payments(
        id integer not null auto_increment,
        orders_id integer not null ,
        amount decimal ,
        date_paid datetime default now(),
        primary key(id)
    );
?>