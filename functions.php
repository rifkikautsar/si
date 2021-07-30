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
function getDataBarang(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT b.id_barang,b.nm_barang,b.tanggal, b.jumlah,k.nm_kat,s.nm_supplier,st.nm_satuan,rb.baik,rb.rusak,rb.rusak_berat,rb.sumber from barang b join rincian_barang rb using(id_barang) join kategori_barang k using(id_kat) join satuan st using(id_satuan) join supplier s using(id_supplier)";
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
function getSupplier(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT * from supplier";
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
function getKategori(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT * from kategori_barang";
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
function getSatuan(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$sql= "SELECT * from satuan";
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