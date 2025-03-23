<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
Class Job extends Model {
    use HasFactory;
protected $table = "job_listings";
// protected $fillable = ['title','salary','employer_id'];

protected $guarded = ['id'];

public function employer() {
    return $this->belongsTo(Employer::class);
}

  public function tags(){
    return $this->belongsToMany(Tag::class);
  }
}
