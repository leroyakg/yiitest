CREATE TABLE tbl_user (
    seqNo INT NOT NULL AUTO_INCREMENT,
    name CHAR(30),
    PRIMARY KEY(seqNo)
)   ENGINE=INNODB;

INSERT INTO tbl_user (name) VALUES ('Billy Davis');
INSERT INTO tbl_user (name) VALUES ('Sam Jones');
INSERT INTO tbl_user (name) VALUES ('Tom Michaels');

CREATE TABLE tbl_client (
    seqNo INT NOT NULL AUTO_INCREMENT,
    name CHAR(30),
    PRIMARY KEY(seqNo)
)   ENGINE=INNODB;

INSERT INTO tbl_client (name) VALUES ('Billings');
INSERT INTO tbl_client (name) VALUES ('Tanner');
INSERT INTO tbl_client (name) VALUES ('Utley');

CREATE TABLE tbl_sale (
    seqNo INT NOT NULL AUTO_INCREMENT,
    date_sale DATE,
    userSeqNo INT NOT NULL,
    clientSeqNo INT NOT NULL,
    prod INT NOT NULL,
    payout  INT NOT NULL,

    PRIMARY KEY(seqNo),
    INDEX (userSeqNo, clientSeqNo),

    FOREIGN KEY (userSeqNo)
      REFERENCES tbl_user(seqNo)
      ON UPDATE CASCADE ON DELETE CASCADE,

    FOREIGN KEY (clientSeqNo)
      REFERENCES tbl_client(seqNo)
      ON UPDATE CASCADE ON DELETE CASCADE
)   ENGINE=INNODB;

INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-06-16', 1 , 1, 10, 1);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-01-01', 1 , 1, 20, 2);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-02-01', 1 , 1, 30, 3);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-03-01', 1 , 1, 40, 4);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-06-16', 2 , 2, 50, 5);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-02-01', 1 , 2, 60, 6);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-03-16', 2 , 2, 70, 7);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-04-01', 3 , 2, 80, 8);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-04-01', 1 , 3, 90, 9);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-05-01', 2 , 3, 100, 10);
INSERT INTO tbl_sale (date_sale, userSeqNo, clientSeqNo, prod, payout) VALUES ('2014-06-01', 3 , 3, 110, 11);

