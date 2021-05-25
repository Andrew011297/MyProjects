
# *****************************************************
# *** Create the table structure for the table 'fine_feedback' *****
# *****************************************************

DROP TABLE IF EXISTS `fine_feedback`;
CREATE TABLE IF NOT EXISTS `fine_feedback` (
  `feedbackID` int(11) NOT NULL AUTO_INCREMENT,
  `custForename` varchar(255) DEFAULT NULL,
  `custSurname` varchar(255) DEFAULT NULL,
  `custEmail` varchar(255) DEFAULT NULL,
  `rLocation` char(3) NOT NULL,
  `qService` varchar(9) NOT NULL,
  `qFood` varchar(7) NOT NULL,
  `moreFeedback` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`feedbackID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

# *****************************************************
# *** Create the table structure for the table 'fine_location' *****
# *****************************************************

DROP TABLE IF EXISTS `fine_location`;
CREATE TABLE IF NOT EXISTS `fine_location` (
  `locationID` char(3) NOT NULL,
  `locationName` varchar(20) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

# *****************************************************
# ***Insert record data for the table `fine_location`**********
# *****************************************************

INSERT INTO `fine_location` (`locationID`, `locationName`) VALUES
('ncl', 'Newcastle'),
('sun', 'Sunderland'),
('nyc', 'New York'),
('par', 'Paris'),
('rom', 'Rome');
