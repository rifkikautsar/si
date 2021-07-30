<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
    global $db;
	$db=new mysqli("localhost","root","","si");
	return $db;
}
function getKepala(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT nm_petugas,hak_akses,username,id_petugas from petugas where hak_akses='kepala'";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getPetugas(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT nm_petugas,hak_akses,username,id_petugas from petugas where hak_akses='petugas'";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getAdmin(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT nm_petugas,hak_akses,username,id_petugas from petugas where hak_akses='admin'";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getAnggota(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT * from anggota";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
function getBarang(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT * from barang";
		$res=$db->query($sql);
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}