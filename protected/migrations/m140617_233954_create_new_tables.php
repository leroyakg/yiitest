<?php

class m140617_233954_create_new_tables extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_user', array(
            'seqNo' => 'pk',
            'name' => 'char(30) NOT NULL',
        ));

        $this->createTable('tbl_client', array(
            'seqNo' => 'pk',
            'name' => 'char(30) NOT NULL',
        ));

        $this->createTable('tbl_sale', array(
            'seqNo' => 'pk',
            'date' => 'DATE',
            'userSeqNo' => 'INT',
            'clientSeqNo' => 'INT',
            'prod' => 'DECIMAL(15,2)',
            'pAyout' => 'DECIMAL(15,2)'
        ));

        $this->addForeignKey('FK_user', 'tbl_sale', 'userSeqNo', 'tbl_user', 'seqNo', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('FK_client', 'tbl_sale', 'clientSeqNo', 'tbl_client', 'seqNo', 'CASCADE', 'RESTRICT');
  

        
	}

	public function down()
	{
		$this->dropTable('tbl_user');
		$this->dropTable('tbl_client');
		$this->dropTable('tbl_sale');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}