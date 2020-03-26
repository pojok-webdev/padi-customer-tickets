<?php
	function getsuspects(){
		$ci = & get_instance();
		$arrsubordinates = getuserchildren($ci->ionuser->id);
		$subordinates = "'" . implode("','",$arrsubordinates) . "'";
		$sql = "select ";
		$sql.= "a.id,client_id,a.name,a.address,a.city,a.createdate,a.sale_id,a.business_field,b.username sales, ";
		$sql.= "case "; 
		$sql.= "when a.name is null then '0'  ";
		$sql.= "when a.address is null then '0'  ";
		$sql.= "when a.city is null then '0'  ";
		$sql.= "when a.phone is null then '0'  ";
		$sql.= "else '1'  ";
		$sql.= "end iscomplete   ";
		$sql.= " ";
		$sql.= "from suspects a ";
		$sql.= "left outer join users b on b.id=a.sale_id where a.status='0' ";
		$sql.= "and sale_id in (".$subordinates.") ";
		$sql.= "and hide='0'";
		$query = $ci->db->query($sql);
		$result = $query->result();
		return $result;
	}
	function isComplete($id){
		$obj = new Client();
		$obj->where('id',$id)->get();
		foreach($this->db->list_fields("clients") as $field){
			if($obj->has_internet_connection=="1"){
				if(($field<>'branches')&&($field<>'billaddress')&&($field<>'tanggal_kontrak')&&($field<>'activedate')&&($field<>'period1')&&($field<>'period2')&&($field<>'category_id')&&($field<>'npwp')&&($field<>'siup')&&($field<>'kode_pelanggan')&&($field<>'random_identifier')&&($field<>'ratio')&&($field<>'followed_up')&&($field<>'prospect')&&($field<>'service_id')&&($field<>'reason2not_interested')&&($field<>'phone_area')&&($field<>'alias')&&($field<>'fax')&&($field<>'fax_area')&&($field<>'known_from')&&($field<>'prospectdate')){
					if ((trim($obj->$field)==="" ||$obj->$field ===null)){
						//return true;
						return false;
					}
				}
			}else{
				if(($field<>'branches')&&($field<>'billaddress')&&($field<>'tanggal_kontrak')&&($field<>'activedate')&&($field<>'period1')&&($field<>'period2')&&($field<>'category_id')&&($field<>'npwp')&&($field<>'siup')&&($field<>'kode_pelanggan')&&($field<>'random_identifier')&&($field<>'ratio')&&($field<>'followed_up')&&($field<>'prospect')&&($field<>'service_id')&&($field<>'reason2not_interested')&&($field<>'media')&&($field<>'speed')&&($field<>'ratio')&&($field<>'duration')&&($field<>'usage_period')&&($field<>'user_amount')&&($field<>'fee')&&($field<>'operator')&&($field<>'end_of_contract')&&($field<>'problems')&&($field<>'phone_area')&&($field<>'alias')&&($field<>'fax')&&($field<>'fax_area')&&($field<>'known_from')&&($field<>'prospectdate')){
					if ((trim($obj->$field)==="" ||$obj->$field ===null)){
						//return true;
						return false;
					}
				}
			}
		}
		return true;	
	}
	function getsuspectbyclientid($id){
		$sql = "select ";
		$sql.= "* from suspects ";
		$sql.= "where client_id=".$id;
		$ci = & get_instance();
		$query = $ci->db->query($sql);
		$result = $query->result();
		return $result[0];
	}
	function getsuspectpicbyid($id){
		$sql = "select ";
		$sql.= "b.* from suspects a ";
		$sql.= "left outer join pics b on b.client_id=a.client_id ";
		$sql.= "where a.id=".$id;
		$ci = & get_instance();
		$query = $ci->db->query($sql);
		$result = $query->result();
		return $result;
	}
	function getsuspectpicbyclientid($client_id){
		$sql = "select ";
		$sql.= "b.* from suspects a ";
		$sql.= "left outer join pics b on b.client_id=a.client_id ";
		$sql.= "where a.client_id=".$client_id;
		$ci = & get_instance();
		$query = $ci->db->query($sql);
		$result = $query->result();
		return $result;
	}	
	function getsuspectpicbyidcommaseparated($id){
		$sql = "select ";
		$sql.= "b.* from suspects a ";
		$sql.= "left outer join pics b on b.client_id=a.client_id ";
		$sql.= "where a.id=".$id;
		$ci = & get_instance();
		$query = $ci->db->query($sql);
		$result = $query->result();
		$arr =array();
		foreach($result as $res){
			array_push($arr,$res->name);
		}
		return implode(",",$arr);
	}
	function x($status,$active,$user){
		$obj = new Client();
		if(is_null($user)){
			$obj->where_in('status',$status)->where_in('active',$active)->get();
		}
		else{
			$obj->where_in('status',$status)->where_in('active',$active)->where_related_user('id',$user)->get();
		}
		return $obj;

	}
	function mandatory_fields(){
		$out = array(
			"name",
			"phone",
			"address",
			"city",
			
		);
		return $out;
	}
	function getambybranch($branch_id,$dt1,$dt2){
		$ci = & get_instance();
		$sql = "select distinct a.id,a.username from users a left outer join branches_users b on b.user_id=a.id ";
		$sql.= "left outer join groups_users c on c.user_id=a.id ";
		$sql.= "left outer join clients d on d.sale_id=a.id ";
		$sql.= "where c.group_id=3 and b.branch_id in(".$branch_id.") and d.id is not null and d.createdate>'".$dt1."'  and d.createdate<'".$dt2."' ";
		$qry = $ci->db->query($sql);
		return $qry->result();
	}
?>
