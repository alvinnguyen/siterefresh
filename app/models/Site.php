<?php

class Site extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    /**
     * Refresh the site, save to object
     * @return void
     */
    public function refresh(){
        $headers = get_headers($this->url, 1);
        $content_length = $headers["Content-Length"];
        $content = file_get_contents($this->url, NULL, NULL, NULL, $content_length);
        $reload = new Reload;
        $reload->site_id = $this->id;
        $reload->weight = ceil($content_length/1024);
        $reload->hash = md5($content);
        $reload->save();
    }
}