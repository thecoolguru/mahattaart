<?php 
class Search_model extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}
    public function get_max_size($image_id)
    {
        $this->db->select('*');
        $this->db->where('images_id',$image_id);
        $query=$this->db->get('tbl_images_search');
        return $query->row();
    }
	
	public function get_image_id_based_on_fileName($fileName)
{
        $sql_1="select images_id from tbl_images_search where images_filename='".$fileName."'";
        $rows=  mysql_query($sql_1);
        $result=  mysql_fetch_assoc($rows);
        return $result['images_id'];
        
}

public function get_category_id_based_on_image_id($image_id)
{
        $sql_1="select categories_id from tbl_images_to_categories where images_id='".$image_id."'";
        $rows=  mysql_query($sql_1);
        $result=  mysql_fetch_assoc($rows);
        return $result['categories_id'];
        
}


    public function get_range($image_id)
    {
        $this->db->select('*');
        $this->db->where('images_id',$image_id);
        $query=$this->db->get('tbl_images_search');
        return $query->row();
    }
    public function get_image_shape($images_id)
    {
        $this->db->select('shapes');
        $this->db->where('images_id',$images_id);
        $query=$this->db->get('tbl_images_to_categories');
        return $query->row();
    }
	
	public function search_test($keywords)
	{		
		$final_search_text="";
		$count=count($keywords);
		$i=1;
		// foreach ($keywords as $keyword)
		// {
		// 	if($count==$i)
		// 		$final_search_text.="images_keywords like '%".$keyword."%'";
		// 	else
		// 		$final_search_text.="images_keywords like '%".$keyword."%' or ";
		// 	$i++;
		// }
		//print_r($keywords);
		foreach ($keywords as $keyword)
		{
			if($count==$i)
				$final_search_text.=" tbl_images_search.images_keywords like '% ".$keyword.", %'";
				//$final_search_text.="tbl_images_search.images_keywords like '%,".$keyword.",%' or tbl_images_search.images_keywords like '%, ".$keyword." ,%' or tbl_images_search.images_keywords like '%, ".$keyword.",%' or tbl_images_search.images_keywords like '%,".$keyword." ,%'  ";
			else
				$final_search_text.=" tbl_images_search.images_keywords like '% ".$keyword.", %' and ";
				//$final_search_text.="tbl_images_search.images_keywords like '%,".$keyword.",%' or tbl_images_search.images_keywords like '%, ".$keyword." ,%' or tbl_images_search.images_keywords like '%, ".$keyword.",%' or tbl_images_search.images_keywords like '%,".$keyword." ,%'  and ";
			$i++;
		}

		$query="SELECT DISTINCT images_id,images_filename,images_keywords from tbl_images_search WHERE ".$final_search_text." Limit 0, 100";
		$res=$this->db->query($query);
		return $res->result();
	}

	public function get_image_data($images_id)
	{
		$this->db->select('*');
		$this->db->where('images_id',$images_id);
		$query=$this->db->get('tbl_images_search');
		return $query->row();
	}
           public function get_files_data($images_id)
	{
		$this->db->select('*');
		$this->db->where('images_id',$images_id);
		$query=$this->db->get('tbl_images_search');
		return $query->row();
	}
	public function show_collection_images($collection_id,$limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->where('images_collectionid',$collection_id);
		$this->db->order_by("images_filename","desc");
		$query=$this->db->get('tbl_images_search');
		return $query->result_array();
	}
public function get_paper_type_name(){
	  $this->db->select('paper_type_name');
	  $this->db->group_by('paper_type_name');
	  $this->db->where_not_in('paper_type_name','');
	  $query=$this->db->get('tbl_web_price');
	  return $query->result();
	  }
	public function post_comment($com,$image_id,$user_id)
	{
		$data=array('image_id'=>$image_id,'comment'=>$com,'user_id'=>$user_id);
		$this->db->insert('tbl_customer_review',$data);
	}
	public function get_two_posted_comments($image_id)
	{
	 $this->db->limit('2','0');
	 $this->db->select('*');
	 $this->db->where('image_id',$image_id);
	 $this->db->order_by("comment_date","desc");
	 $query=$this->db->get('tbl_customer_review');
	 if($query->num_rows()>'0')
	 	return $query->result_array();
	 else return null;
	}

	public function get_customer_detail($user)
	{
		$this->db->select('*');
		$this->db->where('customer_id',$user);
		$query=$this->db->get('tbl_registration');
		return $query->result_array();
	}

	public function sale_counter($categ,$j)
	{
		$this->db->select('sales_counter');
		for($i=0;$i<$j;$i++)
		{
			$this->db->like('images_keywords',$categ[$i]);
			$this->db->or_like('images_description',$categ[$i]);
			$this->db->or_like('images_filename',$categ[$i]);
		}
		$query=$this->db->get('tbl_images_search');
		if($query->num_rows()>'0')
			return $query->result_array();
		else return null;
	}
	public function get_paper_web_price($paper_type)
	  {
	    //echo $paper_type;
		/*
	     if($paper_type!=''){
		 $paper_type_name=$paper_type;
		 }else{
	  $paper_type_name="Archival";
	  }*/
	   $this->db->select('paper,display_p_name');
       $this->db->group_by('paper');
       $this->db->where_not_in('paper','');
	  // $this->db->where('paper_type_name',$paper_type_name);
        $query=$this->db->get('tbl_web_price');
        return $query->result(); 
	  }
	public function get_web_price()
	  {
	  
	   $this->db->select('*');
        $this->db->where('quality','C');
       $this->db->where('paper','Hahnemuhle Photo Matte Fibre');
        $query=$this->db->get('tbl_web_price');
        return $query->result(); 
	  }
	public function get_sub_categories($main_category)
	{
		$this->db->select('*');
		$this->db->where('main_category_name',$main_category);
		$query=$this->db->get('tbl_subjects_sub_categories');
		return $query->result_array();
	}
	public function get_max_val_sale_coun($categ,$count)
	{
		$this->db->select('*');
		$this->db->select_max('sales_counter');
		for($i=0;$i<$count;$i++)
		{
			$this->db->like('images_keywords',$categ[$i]);
			$this->db->or_like('images_description',$categ[$i]);
			$this->db->or_like('images_filename',$categ[$i]);
		}
	 $query=$this->db->get('tbl_images_search');
	 if($query->num_rows()>'0')
	 	return $query->row();
		else return null;
	}
	public function get_sorted_images_for_selected_option_in_dropdown($new_img,$sort)
	{
	 $this->db->select('*');
	 $this->db->where_in('images_id',$new_img);
	 if($sort=='1')
	 	$this->db->order_by("sales_counter","desc");
	 else if($sort=='2')
	 	$this->db->order_by("images_uploaded_date","desc");
	 $query=$this->db->get('tbl_images_search');
	 return $query->result();
	}
	public function get_searchdata_for_top_photographers($keyword,$limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->where('artist_name',$keyword);
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function get_filtered_images_details($data,$limit,$start)
	{
		$coun=count($data);
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->where('images_id',$data[0]);
		for($i=1;$i<$coun;$i++)
		{
			$this->db->or_where('images_id',$data[$i]);
		}
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}
	public function count_for_top_photographers($keyword)
	{
		$this->db->select('*');
		$this->db->where('artist_name',$keyword);
		$query=$this->db->get('tbl_images_search');
		return $query->num_rows();
	}
	/*public function count_bestseller_data()
	 {
	$this->db->select('*');
	$query=$this->db->get('tbl_images_search');
	return $query->num_rows();
	}*/
	public function get_bestseller_data($limit,$start)
	{
		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->order_by("sales_counter","desc");
		$query=$this->db->get('tbl_images_search');
		return $query->result();

	}
	
	public function search_allany($page_no,$no_of_res,$search_keys){
	//$array_cat=array("cat","lion","bird");
	//print
	$result_header_images=$this->get_header_images($search_keys);
	//print_r($result_header_images[0]->search_logic);
	$search_logic=$result_header_images[0]->search_logic;
	if($search_logic==1){
	$keyword_search=$result_header_images[0]->keyword;
	}else{
	$keyword_search=$result_header_images[0]->keyword_any;
	}
	$minus_keyword=explode(',',$result_header_images[0]->minus_keyword);
	$per_page=count($minus_keyword)*2+$no_of_res;
	$array_cat=explode(",",trim($keyword_search));
	//print_r($keyword_search);
	//$array_cat=array($search_keys);
//echo 'ss'.count($array_cat).'ss';
for($x=0;$x<count($array_cat);$x++){
  $search_api = "http://api.indiapicture.in/wallsnart/search.php?q=$array_cat[$x]&page=$page_no&per_page=$per_page";
$opts = array("http"=>array("header"=>"User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
//echo $search_api;

$search_data_raw = file_get_contents($search_api, false, $context);
$search_data[] = json_decode($search_data_raw,TRUE);
//$variable=$search_data['results'];
//print_r($search_data);
////$data['action']='dosearch';
//$data_result=$search_data['results'];
//return $search_data;

}
return $search_data;
	}
	public function get_header_images($search_keys){
	$this->db->select('*');
	$this->db->where('title',$search_keys);
	$this->db->where('cat_id','1');
	$query=$this->db->get('header_images');
	$result=$query->result();
	return $result;
	
	}
	public function get_images_according_to_filter($start,$limit,$arr)
	{

		$this->db->limit($limit,$start);
		$this->db->select('*');
		$this->db->where('images_filename',$arr[$start]);
		$start=$start+1;
		for($i=$start;$i<$limit;$i++)
		{
			$this->db->or_where('images_filename',$arr[$i]);
		}
		$query=$this->db->get('tbl_images_search');

		//print $this->db->last_query();
		return $query->result();
	}

	// public function keyword_search($search_text,$sort_by,$page,$limit)
	// {
	// 	$start=($page-1)*$limit;
	// 	$end = $page*$limit;
	// 	$final_search_text="";
	// 	$keywords=explode('%20', $search_text);
	// 	$count=count($keywords);
	// 	$i=1;
	// 	if($sort_by==3)
	// 	{
	// 		foreach ($keywords as $keyword)
	// 		{
	// 			if($count==$i)
	// 				$final_search_text.="tbl_images_search.images_keywords like '%".$keyword."%'";
	// 			else
	// 				$final_search_text.="tbl_images_search.images_keywords like '%".$keyword."%' and ";
	// 			$i++;
	// 		}
	// 	}
	// 	else if($sort_by==2)
	// 	{
	// 		foreach ($keywords as $keyword)
	// 		{
	// 			if($count==$i)
	// 				$final_search_text.="tbl_images_search.images_description like '%".$keyword."%'";
	// 			else
	// 				$final_search_text.="tbl_images_search.images_description like '%".$keyword."%' and ";
	// 			$i++;
	// 		}
	// 	}
	// 	else if($sort_by==1)
	// 	{
	// 		foreach ($keywords as $keyword)
	// 		{
	// 			if($count==$i)
	// 				$final_search_text.="tbl_images_search.artist_name like '%".$keyword."%'";
	// 			else
	// 				$final_search_text.="tbl_images_search.artist_name like '%".$keyword."%' and ";
	// 			$i++;
	// 		}
	// 	}

	// 	$query="SELECT SQL_CALC_FOUND_ROWS * FROM (
	// 	SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
	// 	LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
	// 	LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id WHERE ".$final_search_text."
	// 	ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";

	// 	$res=$this->db->query($query);
	// 	return $res->result();
	// }

	public function collection_category_map($category_id)
	{
		if($category_id==86)
		{
			return 1011;
		}
		else if($category_id==788)
		{
			return 184;
		}
		else if($category_id==789)
		{
			return 143;
		}
		else if($category_id==128)
		{
			return 1018;
		}
		else if($category_id==126)
		{
			return 1012;
		}
		else if($category_id==127)
		{
			return 174;
		}
		else if($category_id==87)
		{
			return 126;
		}
		else if($category_id==88)
		{
			return 140;
		}
		else if($category_id==792)
		{
			return 16;
		}
        elseif($category_id==838)
        {
            return 1001;
        }
        elseif($category_id==839)
        {
            return 1002;
        }
        elseif($category_id==840)
        {
            return 1016;
        }
        elseif($category_id==841)
        {
            return 1017;
        }elseif($category_id==993){
			return 1006;
        }elseif($category_id==994){
                return 71;
        }
        elseif($category_id==995){
                return 1007;
        }
        elseif($category_id==996){
                return 1008;
        }
         elseif($category_id==997){
                return 1009;
        }       
           elseif($category_id==997){
                return 1009;
        }    
        elseif($category_id==998){
                return 1010;
        }    
        elseif($category_id==998){
                return 1011;
        } elseif($category_id==1000){
                return 1013;
				
        }    
		elseif($category_id==1001){
		return 1014;
		
        }elseif($category_id==1002){
		return 1015;
		}elseif($category_id==999){
		return 1019;
		}        
		elseif($category_id==1053){
		return 1020;
		}        
                

	}

	public function product_type_filter($product_type_category)
	{
		$product_type_category=str_replace('%20', ' ', $product_type_category);
		return "tbl_images_to_categories.product_type like '%".$product_type_category."%'";
	}
	
	public function all_cases($str_search,$str_cat,$str_prod,$str_coll)
	{
		$A=$C="";
		$X="";
		if((!empty($str_search))&&(!empty($str_cat)))
		{
			$A=$str_search." and ".$str_cat;
		}
		else 
		{
			if(!empty($str_search))
			{
				$A=$str_search;
			}
			else
			{
				$A=$str_cat;
			}
		}
		
		/* if((!empty($str_cat))&&(!empty($str_prod)))
		{
			$B=$str_cat." and ".$str_prod;
		}
		else 
		{
			if((!empty($str_cat)))
			{
				$B=$str_cat;
			}
			else 
			{
				$B=$str_prod;
			}
		} */
		
		if((!empty($str_prod))&&(!empty($str_coll)))
		{
			$C=$str_prod." and ".$str_coll;
		}
		else 
		{
			if(!empty($str_prod))
			{
				$C=$str_prod;
			}
			else 
			{
				$C=$str_coll;
			}
		}		
		
		//=========
		if((!empty($A))&&(!empty($C)))
		{
			$X=$A." and ".$C;
		}
		else 
		{
			if(!empty($A))
			{
				$X=$A;
			}
			else 
			{
				$X=$C;
			}
		}
		return $X;
	}

	public function get_search_data($category_id,$page,$limit,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$size,$price_slab,$shape,$filterColor)
	{
          $values=  $this->searchtotalnoofimages_model($category_id,$page,$limit,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$size,$price_slab,$shape,$filterColor);
	 echo '<input type="hidden" id="totalnoofimages" value='.$values.'>';
          
          
          //print_r($values);
           $start=($page-1)*$limit;
               if($start=='-32')
                {
                  $start=0; 
                }
		$end = $page*$limit;

		$filter_str="";
		$add_and="";
		
		$str_cat="";
		$str_prod="";
		$str_coll="";
		$str_search="";
		$str_medium="";
		//$str_price="";
                
              //echo $filter_collection;
                
                
		if($category_id!="none")
		{
                   
                    $cate = str_replace("%20"," +",$category_id);
                    
                   $str_cat.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $cate ."' IN BOOLEAN MODE)  ";  
			//$str_cat.="tbl_images_to_categories.categories_id=".$category_id."";
			//$add_and=" and ";
		}

                  
            
                
		if($search_text!="none")
		{
            $k = str_replace("%20"," +",$search_text);
            $e= str_replace("%20"," ",$search_text);
     
                  
           
            
			if (strpos($search_text,'%20') !== false) 
			{
			    $keywords=explode('%20', $search_text);
			}
			else
			{
				$keywords=explode(',', $search_text);	
			}
			
			$count=count($keywords);
			$i=1;
			$searchKey = str_replace("%20","+",$search_text);
                       
			if($sort_by==3)
			{
                              
                    $split=  explode('+',$searchKey); 

//                    $arr_pre= array('cat','man','men','dog','kid');
//                    $explode= explode('+',$searchKey); 
//                    $resultMatch=   array_intersect($arr_pre, $explode);
//                    $diffValues=  array_diff($explode, $arr_pre); 
//                    //print_r($resultMatch);
//                     
//                    for($aj=0; $aj<=count($arr_pre);$aj++)
//                    {
//                    $search_thec.= $explode[$aj].'^';
//                    $GetDiffVal.= $diffValues[$aj];
//                    }
//                    
//
//                                          if(!empty($resultMatch))
//                    {
//                     $ChangeSearchVal=$search_thec;
//                     count($ChangeSearchVal);
//                     $SaecrhKeyW=$GetDiffVal.' '.$ChangeSearchVal;
//                    
//                   $splitVal= explode('^',$search_thec);
//                     if($splitVal[0]=='cat' || $splitVal[0]=='dog' || $splitVal[0]=='men' || $splitVal[0]=='man' || $splitVal[0]=='kid')
//                     {
//                         $advanceSearch.=' +'.$splitVal[0].'s';
//                     }if($splitVal[1]=='cat' || $splitVal[1]=='dog' || $splitVal[1]=='men' || $splitVal[1]=='man' || $splitVal[0]=='kid')
//                     {
//                         $advanceSearch.=' +'.$splitVal[1].'s';
//                     } if($splitVal[2]=='cat' || $splitVal[2]=='dog' || $splitVal[2]=='men' || $splitVal[2]=='man' || $splitVal[0]=='kid')
//                     {
//                         $advanceSearch.=' +'.$splitVal[2].'s';
//                     } if($splitVal[3]=='cat' || $splitVal[3]=='dog' || $splitVal[3]=='men' || $splitVal[3]=='man' || $splitVal[0]=='kid')
//                     {
//                         $advanceSearch.=' +'.$splitVal[3].'s';
//                     }  
                    
                    //$str_search.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('".' +'.$GetDiffVal.$advanceSearch."' IN BOOLEAN MODE)";
                   
                   // }else{
                      $str_search.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+".$k."' IN BOOLEAN MODE)  ";  
                    //}

                       //$str_search.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $k ."' IN BOOLEAN MODE)  ";  
                    
 

                            
               // $str_searchpp= " and tbl_images_search.images_keywords like '%".$split[0]."%' and tbl_images_search.images_description like '%".$split[1]."%' or tbl_images_search.images_keywords like '%".$split[1]."%' and tbl_images_search.images_description like '%".$split[0]."%' "; 
                  
                                
				/*foreach ($keywords as $keyword)
				{
					if($count==$i)
						$str_search.="  tbl_images_search.images_keywords like '% ".$k." %' or tbl_images_search.images_keywords like '% ".$keyword.", %' or tbl_images_search.images_keywords like '% ".$keyword." %' "  ;
						//$str_search.="tbl_images_search.images_keywords like '%,".$keyword.",%' or tbl_images_search.images_keywords like '%, ".$keyword." ,%' or tbl_images_search.images_keywords like '%, ".$keyword.",%' or tbl_images_search.images_keywords like '%,".$keyword." ,%'  ";
					else
						$str_search.="  tbl_images_search.images_keywords like '% ".$k." %'or tbl_images_search.images_keywords like '% ".$k." %'or tbl_images_search.images_keywords like '% ".$keyword.", %' or tbl_images_search.images_keywords like '% ".$keyword." %'   and ";
						//$str_search.="tbl_images_search.images_keywords like '%,".$keyword.",%' or tbl_images_search.images_keywords like '%, ".$keyword." ,%' or tbl_images_search.images_keywords like '%, ".$keyword.",%' or tbl_images_search.images_keywords like '%,".$keyword." ,%'  and ";
					$i++;
				}*/
			}
			else if($sort_by==2)
			{
				foreach ($keywords as $keyword)
				{
					if($count==$i)
						$str_search.=" tbl_images_search.images_description like '%".$keyword."%'";
					else
						$str_search.=" tbl_images_search.images_description like '%".$keyword."%' and ";
					$i++;
				}
			}
			else if($sort_by==4)
			{
				foreach ($keywords as $keyword)
				{
					if($count==$i)
						$str_search.=" tbl_images_search.images_filename like '%".$keyword."%'";
					else
						$str_search.=" tbl_images_search.images_filename like '%".$keyword."%' and ";
					$i++;
				}
			}
			// else if($sort_by==1)
			// {
			// 	foreach ($keywords as $keyword)
			// 	{
			// 		if($count==$i)
			// 			$str_search.=" and tbl_images_search.artist_name like '".$keyword."%'";
			// 		else
			// 			$str_search.=" tbl_images_search.artist_name like '".$keyword."%'";
			// 		$i++;
			// 	}
			// }
                        
		}
                //echo $filterColor.'zsd';

		if($filter_product_type!="none")
		{
			$str_prod.=$this->product_type_filter($filter_product_type)." ";
		}
				
		
                
                if($filter_collection!="none")
		{
			$collection_id=$this->collection_category_map($filter_collection);
			 $str_cat.=" tbl_images_to_categories.collection_id=".$collection_id." ";
		}
                if($filterColor!="none")
		{
			$filter_str.=" and MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $filterColor ."' IN BOOLEAN MODE) ";
			//$filter_str.=" and tbl_images_search.images_keywords like '%".$filterColor."%'";
		}
		$split=  explode('+',$searchKey); 
                //$str_searchp= "and tbl_images_search.images_keywords like '%".$split[0]."%' and tbl_images_search.images_description like '%".$split[1]."%' or tbl_images_search.images_keywords like '%".$split[1]."%' and tbl_images_search.images_description like '%".$split[0]."%' "; 
		$filter_str=$this->all_cases($str_search,$str_cat, $str_prod, $str_coll,$filterColor);
		
		if($filter_medium!="none")
		{
			$filter_str.=" and tbl_images_search.images_keywords like '%".$filter_medium."%'";
		}
		
		if($shape!="none")
		{
			$filter_str.=" and tbl_images_to_categories.shapes ='".$shape."'";
		}

                if($filterColor!="none")
		{
			
			 $filter_str.=" and  MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $filterColor ."' IN BOOLEAN MODE) ";
		}
                
                
		/*if($price_slab!="none")
		{
			if($price_slab==1)
			{
				$filter_str.=" and tbl_images_search.price_size".$size."<=5000 ";
			}
			else if($price_slab==2)
			{
				$filter_str.=" and tbl_images_search.price_size".$size.">=5000 and tbl_images_search.price_size".$size."<=10000 ";
			}
			else if($price_slab==3)
			{
				$filter_str.=" and tbl_images_search.price_size".$size.">=10000 and tbl_images_search.price_size".$size.">=20000";
			}
			else if($price_slab==4)
			{
				$filter_str.=" and tbl_images_search.price_size".$size.">=20000 ";
			}
			
		}*///
        if($price_slab!="none")
        {
            if($price_slab==1)
            {
                $filter_str.=" and tbl_images_search.images_min_price<=2000 ";
            }
            else if($price_slab==2)
            {
                $filter_str.=" and tbl_images_search.images_min_price>=2000 and tbl_images_search.images_min_price<=3000 ";
            }
            else if($price_slab==3)
            {
                $filter_str.=" and tbl_images_search.images_min_price>=3000 ";
            }

        }
		
		// Going Into Major Query
		/*if(($category_id==121)||($category_id==122)||($category_id==123)||($category_id==124)||($category_id==790)||($category_id==791))
		{/*
			if($category_id==122)
			{
				$query="SELECT SQL_CALC_FOUND_ROWS * FROM (
				SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
				LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
				LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id and tbl_images_to_categories.categories_id = tbl_images_popularity.categories_id WHERE  tbl_images_to_categories.categories_id=88 or tbl_images_to_categories.categories_id=126 or tbl_images_to_categories.categories_id=127 or tbl_images_to_categories.categories_id=788 or tbl_images_to_categories.categories_id=789 or tbl_images_to_categories.categories_id=86 or tbl_images_to_categories.categories_id=128
				ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			}
			else if($category_id==790)
			{
				$query="SELECT SQL_CALC_FOUND_ROWS * FROM (
				SELECT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
				LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
				LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id and tbl_images_to_categories.categories_id = tbl_images_popularity.categories_id WHERE  tbl_images_to_categories.categories_id=88 or tbl_images_to_categories.categories_id=87 or tbl_images_to_categories.categories_id=126 or tbl_images_to_categories.categories_id=127 or tbl_images_to_categories.categories_id=788 or tbl_images_to_categories.categories_id=789 or tbl_images_to_categories.categories_id=86 or tbl_images_to_categories.categories_id=128
				ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			}
			else if($category_id==791)
			{
				$query="SELECT SQL_CALC_FOUND_ROWS * FROM (
				SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
				LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
				LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id and tbl_images_to_categories.categories_id = tbl_images_popularity.categories_id WHERE  tbl_images_to_categories.categories_id=88 or tbl_images_to_categories.categories_id=87 or tbl_images_to_categories.categories_id=126 or tbl_images_to_categories.categories_id=127 or tbl_images_to_categories.categories_id=788 or tbl_images_to_categories.categories_id=789 or tbl_images_to_categories.categories_id=86 or tbl_images_to_categories.categories_id=128
				ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			}
			else
			{
				$query="SELECT SQL_CALC_FOUND_ROWS * FROM (
				SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
				LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
				LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id and tbl_images_to_categories.categories_id = tbl_images_popularity.categories_id WHERE  tbl_images_to_categories.categories_id=87 or tbl_images_to_categories.categories_id=88 or tbl_images_to_categories.categories_id=126 or tbl_images_to_categories.categories_id=127 or tbl_images_to_categories.categories_id=788 or tbl_images_to_categories.categories_id=789 or tbl_images_to_categories.categories_id=86 or tbl_images_to_categories.categories_id=128
				ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			}
		}*/
		/*else
		{
			//print $filter_str;
			// print $query="SELECT SQL_CALC_FOUND_ROWS * FROM (
			// SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_popularity.final_score FROM tbl_images_search
			// LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			// LEFT JOIN tbl_images_popularity ON tbl_images_to_categories.images_id = tbl_images_popularity.images_id and tbl_images_to_categories.categories_id = tbl_images_popularity.categories_id WHERE
			// ".$filter_str." ORDER BY tbl_images_popularity.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			//$query = "Select * from tbl_images_search where images_id in (Select images_id from tbl_images_to_categories where product_type like '%canvas%' ORDER BY final_score DESC) LIMIT 0, 16";
			// $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (
			// SELECT DISTINCT tbl_images_search.images_id,tbl_images_search.images_filename,tbl_images_search.images_caption,tbl_images_search.images_photographer,tbl_images_to_categories.final_score FROM tbl_images_search
			// LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			// WHERE
			// ".$filter_str." ORDER BY tbl_images_to_categories.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
			
			 $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filenam, tbl_images_search.images_caption, tbl_images_search.images_photographer, tbl_images_to_categories.final_score
			FROM tbl_images_search
			LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			WHERE ".$filter_str."
			ORDER BY tbl_images_to_categories.final_score DESC
			) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";

		}*/
		//$this->db->cache_on();
      /*  if($sort_by==3)
        {
            $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filename, tbl_images_search.images_caption, tbl_images_search.images_photographer
			FROM tbl_images_search

			WHERE ".$filter_str."
			
			) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT 1";
        }*/
        //else
        //{
        if($this->session->userdata('userid')==209)
        {
      $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filename, tbl_images_search.artist_name,tbl_images_search.images_caption, tbl_images_search.images_photographer
			FROM tbl_images_search
			LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			AND  tbl_images_to_categories.images_id = tbl_images_search.images_id
			WHERE ".$filter_str." and visibility_status='0'
			
			ORDER BY tbl_images_to_categories.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
        }else{
            
           $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filename, tbl_images_search.artist_name,tbl_images_search.images_caption, tbl_images_search.images_photographer
			FROM tbl_images_search
			LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			AND  tbl_images_to_categories.images_id = tbl_images_search.images_id
			WHERE ".$filter_str."
			
			ORDER BY tbl_images_to_categories.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";  
            
        }

        $res=$this->db->query($query);
		
		return $res->result();
	}
        
        
        
        
        
       public function searchtotalnoofimages_model($category_id,$page,$limit,$search_text,$sort_by,$filter_product_type,$filter_collection,$filter_medium,$size,$price_slab,$shape,$filterColor)
	{
		$start=($page-1)*$limit;
		$end = $page*$limit;

		$filter_str="";
		$add_and="";
		
		$str_cat="";
		$str_prod="";
		$str_coll="";
		$str_search="";
		$str_medium="";
		
                
		if($category_id!="none")
		{
                    $cate = str_replace("%20"," +",$category_id);
                    
                   $str_cat.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $cate ."' IN BOOLEAN MODE)  ";  
			//$str_cat.="tbl_images_to_categories.categories_id=".$category_id."";
			//$add_and=" and ";
		}

                  
            
                
		if($search_text!="none")
		{
            $k = str_replace("%20"," +",$search_text);
            $e= str_replace("%20"," ",$search_text);
     
                  
           
            
			if (strpos($search_text,'%20') !== false) 
			{
			    $keywords=explode('%20', $search_text);
			}
			else
			{
				$keywords=explode(',', $search_text);	
			}
			
			$count=count($keywords);
			$i=1;
			$searchKey = str_replace("%20","+",$search_text);
                       
			if($sort_by==3)
			{
                     
                      $str_search.=  "MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+".$k."' IN BOOLEAN MODE)  ";  
                    

                     
			}
			else if($sort_by==2)
			{
				foreach ($keywords as $keyword)
				{
					if($count==$i)
						$str_search.=" tbl_images_search.images_description like '%".$keyword."%'";
					else
						$str_search.=" tbl_images_search.images_description like '%".$keyword."%' and ";
					$i++;
				}
			}
			else if($sort_by==4)
			{
				foreach ($keywords as $keyword)
				{
					if($count==$i)
						$str_search.=" tbl_images_search.images_filename like '%".$keyword."%'";
					else
						$str_search.=" tbl_images_search.images_filename like '%".$keyword."%' and ";
					$i++;
				}
			}
			
		}
                //echo $filterColor.'zsd';

		if($filter_product_type!="none")
		{
			$str_prod.=$this->product_type_filter($filter_product_type)." ";
		}
				
		
                
                if($filter_collection!="none")
		{
			$collection_id=$this->collection_category_map($filter_collection);
			 $str_cat.=" tbl_images_to_categories.collection_id=".$collection_id." ";
		}
                if($filterColor!="none")
		{
			$filter_str.=" and MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $filterColor ."' IN BOOLEAN MODE) ";
			//$filter_str.=" and tbl_images_search.images_keywords like '%".$filterColor."%'";
		}
		$split=  explode('+',$searchKey); 
                //$str_searchp= "and tbl_images_search.images_keywords like '%".$split[0]."%' and tbl_images_search.images_description like '%".$split[1]."%' or tbl_images_search.images_keywords like '%".$split[1]."%' and tbl_images_search.images_description like '%".$split[0]."%' "; 
		$filter_str=$this->all_cases($str_search,$str_cat, $str_prod, $str_coll,$filterColor);
		
		if($filter_medium!="none")
		{
			$filter_str.=" and tbl_images_search.images_keywords like '%".$filter_medium."%'";
		}
		
		if($shape!="none")
		{
			$filter_str.=" and tbl_images_to_categories.shapes ='".$shape."'";
		}

                if($filterColor!="none")
		{
			
			 $filter_str.=" and  MATCH (tbl_images_search.images_keywords,tbl_images_search.images_description) AGAINST ('+". $filterColor ."' IN BOOLEAN MODE) ";
		}
                
                
		

                if($price_slab!="none")
                {
                    if($price_slab==1)
                    {
                        $filter_str.=" and tbl_images_search.images_min_price<=2000 ";
                    }
                    else if($price_slab==2)
                    {
                        $filter_str.=" and tbl_images_search.images_min_price>=2000 and tbl_images_search.images_min_price<=3000 ";
                    }
                    else if($price_slab==3)
                    {
                        $filter_str.=" and tbl_images_search.images_min_price>=3000 ";
                    }

                }

             if($this->session->userdata('userid')==209)
        {
      $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filename, tbl_images_search.artist_name,tbl_images_search.images_caption, tbl_images_search.images_photographer
			FROM tbl_images_search
			LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			AND  tbl_images_to_categories.images_id = tbl_images_search.images_id
			WHERE ".$filter_str." and visibility_status='0'
			
			ORDER BY tbl_images_to_categories.final_score DESC) res,(SELECT FOUND_ROWS() AS 'total') tot LIMIT $start, $limit";
        }else{
                
        $query = "SELECT SQL_CALC_FOUND_ROWS * FROM (SELECT DISTINCT tbl_images_search.images_id, tbl_images_search.images_filename, tbl_images_search.artist_name,tbl_images_search.images_caption, tbl_images_search.images_photographer
			FROM tbl_images_search
			LEFT JOIN tbl_images_to_categories ON tbl_images_to_categories.images_id = tbl_images_search.images_id
			AND  tbl_images_to_categories.images_id = tbl_images_search.images_id
			WHERE ".$filter_str."
			ORDER BY tbl_images_to_categories.final_score DESC
			) res,(SELECT FOUND_ROWS() AS 'total') tot ";
        }
        $res=$this->db->query($query);
		
		 return $res->num_rows();
	}
         
        
        
        
       
        
        

	public function render_data_search($keywords)
	{
		$final_search_text="";
		$count=count($keywords);
		$i=1;
		foreach ($keywords as $keyword)
		{
			if($count==$i)
				$final_search_text.="images_keywords like '%".$keyword."%'";
			else
				$final_search_text.="images_keywords like '%".$keyword."%' or ";
			$i++;
		}
		$query="SELECT DISTINCT images_id from tbl_images_search WHERE ".$final_search_text."";
		$res=$this->db->query($query);
		return $res->result();
	}

	public function new_render_data_search($keywords,$p_id)
	{
		$final_search_text="";
		$count=count($keywords);
		$i=1;
        $k = str_replace(" "," +",$keywords);
        //$final_search_text.= "MATCH (tbl_images_search.images_product_types) AGAINST ( '+".$k."*'  IN BOOLEAN MODE)";
        $final_search_text.= "tbl_images_search.images_product_types like '%".$keywords."%' limit 0,183061";
        /*foreach ($keywords as $keyword
        {
            if($count==$i)
                $final_search_text.="tbl_images_search.images_keywords like '%".$keyword."%'";
            else
                $final_search_text.="tbl_images_search.images_keywords like '%".$keyword."%' or ";
            $i++;
        }*/
		if($p_id==120)
		{
			print $query="SELECT DISTINCT images_id,images_collectionid from tbl_images_search WHERE ".$final_search_text."";
		}
		else
		{
			$query="SELECT DISTINCT tbl_images_search.images_id from tbl_images_search INNER JOIN tbl_images_to_categories ON tbl_images_search.images_id=tbl_images_to_categories.images_id where tbl_images_to_categories.categories_id=".$p_id." and ".$final_search_text."";
		}

		$res=$this->db->query($query);

		return $res->result();

	}
    public function render_product_data($keywords)
    {   $final_search_text="";
       // $k = str_replace(" "," +",$keywords);
        //$final_search_text.= "MATCH (tbl_images_search.images_keywords) AGAINST ( '+".$k."'  IN BOOLEAN MODE)";
        print $query="SELECT DISTINCT images_id,images_collectionid,images_product_types from tbl_images_search WHERE images_product_types like'%art prints%' ";
        $res=$this->db->query($query);
        return $res->result();
    }

	public function get_category_by_id($category_id)
	{
		//echo $this->db->where('id',$category_id);
		$query=$this->db->get('tbl_category');
		return $query->row();
	}

	public function get_subcategory($parent_cat)
	{
		$this->db->select('id,p_id,name,keywords');
		$this->db->order_by('name','asc');
                $this->db->where('p_id',$parent_cat);
		$this->db->where('status','1');
		$query=$this->db->get('tbl_category');
		return $query->result();
	}

	// Image Popularity Functions
	public function pop_image_exist($images_id,$category_id)
	{
            
		$this->db->where('images_id',$images_id);
		$this->db->where('categories_id',$category_id);
		$query=$this->db->get('tbl_images_to_categories');
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}


	// Old Image Popularity Functions
	/*public function insert_pop($column_name,$image_id,$category_id)
	{
		$pop_data=$this->pop_image_exist($images_id);
		//For C2E - 5 points
		//for A2G - 10 points
		//For A2C - 25 Points
		$C2E=$pop_data->click_to_elarge;
		$A2G=$pop_data->add_to_gallery;
		$A2C=$pop_data->add_to_cart;
		$sale=$pop_data->sale;
		$final_score = $pop_data->final_score;

		if($column_name=="click_to_elarge")
		{
			$C2E+=0;
		}
		else if($column_name=="add_to_gallery")
		{
			$A2G+=2;
		}
		else if($column_name=="add_to_cart")
		{
			$A2C+=1;
		}
		$total = $C2E + $A2G + $A2C + $sale + $final_score;

		// //For C2E - 5 points
		// //for A2G - 10 points
		// //For A2C - 25 Points
		// $C2E=0;
		// $A2G=0;
		// $A2C=0;
		// $sale=0;
		// $total=0;
		// if($column_name=="click_to_elarge")
		// {
		// 	//$C2E=5;
		// 	$C2E=0;
		// }
		// if($column_name=="add_to_gallery")
		// {
		// 	$A2G=2;
		// }
		// else if($column_name=="add_to_cart")
		// {
		// 	$A2C=1;
		// }
		// $total=$C2E+$A2G+$A2C+$sale;
		// // $data=array(
		// 		'images_id'=> $image_id,
		// 		'categories_id'=> $category_id,
		// 		'click_to_elarge'=> $C2E,
		// 		'add_to_gallery'=> $A2G,
		// 		'add_to_cart'=> $A2C,
		// 		'sale'=> $sale,
		// 		'final_score'=>$total
		// );
		// $this->db->insert('tbl_images_popularity',$data);
		$data = array(
			'add_to_gallery'=>$A2G,
			'add_to_cart'=>$A2C,
			'final_score'=>$total
			);
		$this->db->where('images_id',$images_id);
		$this->db->where('category_id',$category_id);
		$this->db->update('tbl_images_to_categories',$data);
	}*/

    //New Popularity function edited on /08/08/2014
    public function insert_pop($column_name,$image_id,$category_id)
    {
        $pop_data=$this->pop_image_exist($image_id,$category_id);
        //For C2E - 5 points
        //for A2G - 10 points
        //For A2C - 25 Points
        $C2E=$pop_data->click_to_elarge;
        $A2G=$pop_data->add_to_gallery;
        $A2C=$pop_data->add_to_cart;
        $sale=$pop_data->sale;
        $final_score = $pop_data->final_score;

        if($column_name=="click_to_elarge")
        {
            $C2E+=1;
        }
        else if($column_name=="add_to_gallery")
        {
            $A2G+=2;
        }
        else if($column_name=="add_to_cart")
        {
            $A2C+=3;
        }
        $total = $C2E + $A2G + $A2C + $sale ;

        // //For C2E - 5 points
        // //for A2G - 10 points
        // //For A2C - 25 Points
        // $C2E=0;
        // $A2G=0;
        // $A2C=0;
        // $sale=0;
        // $total=0;
        // if($column_name=="click_to_elarge")
        // {
        // 	//$C2E=5;
        // 	$C2E=0;
        // }
        // if($column_name=="add_to_gallery")
        // {
        // 	$A2G=2;
        // }
        // else if($column_name=="add_to_cart")
        // {
        // 	$A2C=1;
        // }
        // $total=$C2E+$A2G+$A2C+$sale;
        // // $data=array(
        // 		'images_id'=> $image_id,
        // 		'categories_id'=> $category_id,
        // 		'click_to_elarge'=> $C2E,
        // 		'add_to_gallery'=> $A2G,
        // 		'add_to_cart'=> $A2C,
        // 		'sale'=> $sale,
        // 		'final_score'=>$total
        // );
        // $this->db->insert('tbl_images_popularity',$data);
        $data = array(
            'click_to_elarge'=>$C2E,
            'add_to_gallery'=>$A2G,
            'add_to_cart'=>$A2C,
            'final_score'=>$total
        );
        $this->db->where('images_id',$image_id);
        $this->db->where('categories_id',$category_id);
        $this->db->update('tbl_images_to_categories',$data);
    }

//OLD update_pop function
/*	public function update_pop($column_name,$images_id)
	{
		$pop_data=$this->pop_image_exist($images_id);
		//For C2E - 5 points
		//for A2G - 10 points
		//For A2C - 25 Points
		$C2E=$pop_data->click_to_elarge;
		$A2G=$pop_data->add_to_gallery;
		$A2C=$pop_data->add_to_cart;
		$sale=$pop_data->sale;

		if($column_name=="click_to_elarge")
		{
			$C2E+=0;
		}
		else if($column_name=="add_to_gallery")
		{
			$A2G+=2;
		}
		else if($column_name=="add_to_cart")
		{
			$A2C+=1;
		}
		$total=$C2E+$A2G+$A2C+$sale;
		$data=array(
				'click_to_elarge'=> $C2E,
				'add_to_gallery'=> $A2G,
				'add_to_cart'=> $A2C,
				'sale'=> $sale,
				'final_score'=>$total
		);
		$this->db->where('images_id',$images_id);
		$this->db->update('tbl_images_popularity',$data);
	}*/
    //New Update_pop function
    public function update_pop($column_name,$images_id,$catgory_id)
    {
        $pop_data=$this->pop_image_exist($images_id,$catgory_id);
        //For C2E - 5 points
        //for A2G - 10 points
        //For A2C - 25 Points
        $C2E=$pop_data->click_to_elarge;
        $A2G=$pop_data->add_to_gallery;
        $A2C=$pop_data->add_to_cart;
        $sale=$pop_data->sale;

        if($column_name=="click_to_elarge")
        {
            $C2E+=1;
        }
        else if($column_name=="add_to_gallery")
        {
            $A2G+=2;
        }
        else if($column_name=="add_to_cart")
        {
            $A2C+=3;
        }
        $total=$C2E+$A2G+$A2C+$sale;
        $data=array(
            'click_to_elarge'=> $C2E,
            'add_to_gallery'=> $A2G,
            'add_to_cart'=> $A2C,
            'sale'=> $sale,
            'final_score'=>$total
        );
        $this->db->where('images_id',$images_id);
        $this->db->update('tbl_images_popularity',$data);
    }

	public function get_image_category($images_id)
	{
		$this->db->where('images_id',$images_id);
		$query=$this->db->get('tbl_images_to_categories');
		$this->db->last_query();
		return $query->row();
	}

	public function get_category_count($category_id)
	{
		$this->db->where('id',$category_id);
		$query=$this->db->get('tbl_category');
		return $query->row()->count;
	}

	public function update_category_count($category_id)
	{
		$old_count=$this->get_category_count($category_id);
		$new_count=$old_count+1;
		$this->db->where('id',$category_id);
		$this->db->update('tbl_category',array('count'=>$new_count));
	}

	public function get_images_by_artistname($name)
	{
		$this->db->select('images_id');
		$this->db->where('artist_name',$name);
		$query=$this->db->get('tbl_images_search');
		return $query->result();
	}

	public function insert_render_data($images_id,$caregories_id,$collection_id)
	{
		$data=array(
				'images_id'=> $images_id,
				'categories_id'=> $caregories_id,
                 'product_type'=>",art prints,posters,canvas,trans light,premium photographic print,photographic print",
                 'collection_id'=>$collection_id

		);
		$this->db->insert('tbl_images_to_categories',$data);
	}

	public function get_imagesdata_by_collection_id($collection_id)
	{
		$query=$this->db->get_where('tbl_images_search',array('images_collectionid'=>$collection_id));
		return $query->result();
	}

	public function get_image_collection($image_id)
	{
        $this->db->select('images_collectionid');
		$query=$this->db->get_where('tbl_images_search',array('images_id'=>$image_id));
		return $query->row();
	}
	
	public function get_categories_images()
	{
		$query=$this->db->get_where('tbl_images_to_categories',array('categories_id'=>413));
		return $query->result();
	}
	
	public function update_data($image_id,$collection_id,$product_type,$category_id)
	{
		$this->db->where('categories_id',$category_id);
		$this->db->where('images_id',$image_id);
		$this->db->update('tbl_images_to_categories',array('collection_id'=>$collection_id,'product_type'=>$product_type));
	}

	public function get_images_data()
	{
		// $var=$this->get_cron_var();
		// $new_var=$var+45;
		// $this->update_cron_var($new_var);
		// $this->db->where('images_id >=',$var);
		// $this->db->where('images_id <=',$new_var);
		$this->db->where('images_id >=',32001);
		$this->db->where('images_id <=',40000);
		$response=$this->db->get('tbl_images_search');
		return $response->result();
	}

	public function get_cron_var()
	{
		$response=$this->db->get('cron_var');
		return $response->row()->var;
	}

	public function update_cron_var($var)
	{
		$this->db->update('cron_var',array('var'=>$var));
	}

	public function update_image_price($data,$images_id)
	{
		$this->db->where('images_id',$images_id);
		$this->db->update('tbl_images_search',$data);
	}
        
        
        public function getUserSearchResult($search_id)
	{
		$this->db->select('name');
		$this->db->where('id',$search_id);
		$query=$this->db->get('tbl_category');
		return $query->result();
	}
        
      public  function check_user_login_details($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('tbl_user_save_login');
        return $query->num_rows();
    }
    
    public function track_login_details($data)
        { 
        
         $this->db->insert('tbl_user_save_login',$data);
        }
    public function update_track_login_details($data1,$user_id)
    {
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user_save_login',$data1);

    } 
}
?>
