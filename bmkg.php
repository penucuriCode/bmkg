<?php

error_reporting(0);

/*
@ Gempa - Info gempa from bmkg.go.id
@ This project was writted by Meow404
@ Copyright 24 - 02 - 2k21
*/

class Gempa
{
	private $r = "\033[91m",
		$g = "\033[92m",
		$y = "\033[93m",
		$b = "\033[94m",
		$m = "\033[95m",
		$c = "\033[96m",
		$w = "\033[97m",
		$n = "\033[0m",
		$p = "\033[1;30m";
		
	public function __construct()
	{
		$this->banner();
		$this->printInfo();
	}
	
	// banner
	public function banner()
	{
		echo "{$this->y}  _____  {$this->r}{ {$this->p}PHP script {$this->r}}                                   \n";
		echo "{$this->y} |   __|___ _____ ___ ___  {$this->w}Author {$this->r}: {$this->w}PenecuriCode - Meow404                  \n";
		echo "{$this->y} |  |  | -_|     | . | .'| {$this->w}Team   {$this->r}: {$this->w}IndoXploit        \n";
		echo "{$this->y} |_____|___|_|_|_|  _|__,| {$this->w}Github {$this->r}: {$this->w}https://github.com/penecuriCode \n";
		echo "{$this->y}                 |_| {$this->r}* {$this->p}Check info gempa dari bmkg.go.id                \n";
	}

	// get info gempa
	private function printInfo()
	{
		$this->getInfo = file_get_contents("http://data.bmkg.go.id/lastgempadirasakan.xml");
		// parse xml
		$this->data = simplexml_load_string($this->getInfo) or die("error: cannot create object");
		// save variable
		$this->tanggal = $this->data->Gempa->Tanggal;
		$this->jam = $this->data->Gempa->Jam;
		$this->lintang = $this->data->Gempa->Lintang;
		$this->bujur = $this->data->Gempa->Bujur;
		$this->magnitude = $this->data->Gempa->Magnitude;
		$this->kedalaman = $this->data->Gempa->Kedalaman;
		$this->keterangan = $this->data->Gempa->Keterangan;
		$this->dirasakan = $this->data->Gempa->Dirasakan;
		// print info
		echo " {$this->r}{ {$this->w}Gempa Information{$this->r} }\n";
		echo " {$this->y}Tanggal     {$this->r}:{$this->y} {$this->tanggal} \n";
		echo " {$this->y}Jam         {$this->r}:{$this->y} {$this->jam} \n";
		echo " {$this->y}Lintang     {$this->r}:{$this->y} {$this->lintang} \n";
		echo " {$this->y}Bujur       {$this->r}:{$this->y} {$this->bujur} \n";
		echo " {$this->y}Magnitude   {$this->r}:{$this->y} {$this->magnitude} \n";
		echo " {$this->y}Kedalaman   {$this->r}:{$this->y} {$this->kedalaman} \n";
		echo " {$this->y}Keterangan  {$this->r}:{$this->y} {$this->keterangan} \n";
		echo " {$this->y}Dirasakan   {$this->r}:{$this->y} {$this->dirasakan} \n";
	}
}
$data = new Gempa();

