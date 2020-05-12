<?php
class Crb_Csv_Import {
	private $post_type;
	private $csv_file;

	public function __construct( $csv_file ) {
		$this->csv_file = get_stylesheet_directory_uri() . '/resources/csv/' . $csv_file;
	}

	public function import($post_type = 'post', $post_status = 'publish') {
		$row = 1;
		$posts = [];
		$handle = fopen($this->csv_file, "r");
		if ($handle !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        
		        $row++;
		        $posts[] = 
		        [
		        	'title' => $data[2],
		        	'content' => $data[4],
		        ];
		    }
		    fclose($handle);
		}

		foreach ( $posts as $post ) {
			wp_insert_post( array(
				'post_type' => $post_type,
				'post_title' => $post['title'],
				'post_content' => $post['content'],
				'post_status' => $post_status,
			) );
		}
	}
}