<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $bookID
 * @property integer $studentID
 * @property integer $slotID
 * @property integer $bookCount
 *
 * @property Student $student
 * @property Slot $slot
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentID', 'slotID', 'bookCount'], 'required'],
            [['studentID', 'slotID', 'bookCount'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bookID' => 'Book ID',
            'studentID' => 'Student ID',
            'slotID' => 'Slot ID',
            'bookCount' => 'Book Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'studentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlot()
    {
        return $this->hasOne(Slot::className(), ['slotID' => 'slotID']);
    }
}
