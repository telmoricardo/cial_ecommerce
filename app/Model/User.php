<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {
    private $user_id;
    private $user_thumb;
    private $user_name;
    private $user_lastname;
    private $user_document;
    private $user_genre;
    private $user_telephone;
    private $user_cell;
    private $user_email;
    private $user_password;
    private $user_channel;
    private $user_registration;
    private $user_lastupdate;
    private $user_lastacess;
    private $user_level;
    private $user_status;
    
    function getUser_id() {
        return $this->user_id;
    }

    function getUser_thumb() {
        return $this->user_thumb;
    }

    function getUser_name() {
        return $this->user_name;
    }

    function getUser_lastname() {
        return $this->user_lastname;
    }

    function getUser_document() {
        return $this->user_document;
    }

    function getUser_genre() {
        return $this->user_genre;
    }

    function getUser_telephone() {
        return $this->user_telephone;
    }

    function getUser_cell() {
        return $this->user_cell;
    }

    function getUser_email() {
        return $this->user_email;
    }

    function getUser_password() {
        return $this->user_password;
    }

    function getUser_channel() {
        return $this->user_channel;
    }

    function getUser_registration() {
        return $this->user_registration;
    }

    function getUser_lastupdate() {
        return $this->user_lastupdate;
    }

    function getUser_lastacess() {
        return $this->user_lastacess;
    }

    function getUser_level() {
        return $this->user_level;
    }

    function getUser_status() {
        return $this->user_status;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setUser_thumb($user_thumb) {
        $this->user_thumb = $user_thumb;
    }

    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    function setUser_lastname($user_lastname) {
        $this->user_lastname = $user_lastname;
    }

    function setUser_document($user_document) {
        $this->user_document = $user_document;
    }

    function setUser_genre($user_genre) {
        $this->user_genre = $user_genre;
    }

    function setUser_telephone($user_telephone) {
        $this->user_telephone = $user_telephone;
    }

    function setUser_cell($user_cell) {
        $this->user_cell = $user_cell;
    }

    function setUser_email($user_email) {
        $this->user_email = $user_email;
    }

    function setUser_password($user_password) {
        $this->user_password = $user_password;
    }

    function setUser_channel($user_channel) {
        $this->user_channel = $user_channel;
    }

    function setUser_registration($user_registration) {
        $this->user_registration = $user_registration;
    }

    function setUser_lastupdate($user_lastupdate) {
        $this->user_lastupdate = $user_lastupdate;
    }

    function setUser_lastacess($user_lastacess) {
        $this->user_lastacess = $user_lastacess;
    }

    function setUser_level($user_level) {
        $this->user_level = $user_level;
    }

    function setUser_status($user_status) {
        $this->user_status = $user_status;
    }


}
