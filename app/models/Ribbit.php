<?php

/**
 * An Eloquent Model: 'Ribbit'
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ribbit
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Ribbit extends Eloquent {
	protected $guarded = array();

    /**
     * Users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

}
