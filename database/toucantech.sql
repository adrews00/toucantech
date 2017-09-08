
CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `members` (`member_id`, `member_name`, `member_email`) VALUES
(1, 'John ', 'john@gmail.com'),
(2, 'Oliver', 'oliver@gmail.com'),
(3, 'Harry', 'harry@gmail.com'),
(4, 'Lily', 'Lily@gmail.com'),


CREATE TABLE `memb_scho` (
  `member_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `memb_scho` (`member_id`, `school_id`) VALUES
(1, 2),
(1, 1),
(1, 3),
(2, 2),
(3, 2),
(3, 3),
(3, 1),

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `schools` (`school_id`, `school_name`) VALUES
(1, 'Bristol'),
(2, 'Devon'),
(3, 'Dorset'),
(4, 'North Somerset'),
(5, 'Plymouth'),
(6, 'Poole'),
(7, 'Swindon'),
(8, 'Torbay'),
(9, 'York'),
(10, 'Hull'),
(11, 'Leeds'),
(12, 'Bradford');

ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

ALTER TABLE `memb_scho`
  ADD KEY `member_id` (`member_id`),
  ADD KEY `school_id` (`school_id`);

ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
