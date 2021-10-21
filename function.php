function display_category(){
		// -------------menampilkan kategori yang dimiliki oleh post----------
		$categories 	= get_the_category();
		$separator		=", ";
		$ouput 			=' ';
			
			if ($categories) {
				foreach ($categories as $category) {$ouput 	.=' <a href="'.get_category_link($category->term_id).'">'.$category->name.'</a>' . $separator; }
				echo trim($ouput,$separator);
			}	
}
//-------------daftarkan hook action display category dengan nama display cat---------------
add_action('display_cat','display_category');



function time_and_update_article(){
	
	//mengambil waktu lokal dari postingan dalam detik		
	$original_time 			= get_the_time('U');
	
	//mengambil data waktu update terakhir post / tulisan
	$last_modified_time 	= get_the_modified_time('U');

	//cek apakah update lebih dari 24 jam, jika update lebih dari sehari tampilkan juga waktu updatenya jika tidak tampilkan hanya waktu postnya saja.
	if ($last_modified_time >= $original_time + 86400) {
		echo "Posted on - ".get_the_time('j F Y')." | Last updated - ".get_the_modified_time('j F Y')." | ";
	}else{
		echo "Posted on - ".get_the_time('j F Y')." | ";
	}

}
//-------------daftarkan hook action time and update article dengan nama time article---------------
add_action('time_article','time_and_update_article',10);



function last_content($the_content){

	$data =$the_content."<br> <small>#AyokLiburan</small> ";
	
	return $data;
}
//--------------------daftakarn hook filter last content dengan nama isi conteten yang dimana untuk menambahkan #ayokliburan--------------------
add_filter('isi_content','last_content');
