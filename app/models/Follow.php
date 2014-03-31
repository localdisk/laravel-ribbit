<?php

/**
 * An Eloquent Model: 'Follow'
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $followee_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Follow extends Eloquent {
	protected $guarded = array();

    protected $fillable = ['user_id', 'followee_id'];

    public function users()
    {
        return $this->belongsTo('User');
    }
}
