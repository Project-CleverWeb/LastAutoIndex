<?php
/**
 * Directory Index
 * ===============
 * Shows the current directory listing in a table
 * 
 * NOTE: For every "index.php" file in your theme, you should give a 'forbidden'
 * message of some sort, like below.
 */
if (!class_exists('lastautoindex', FALSE)) {
	exit("Forbidden: This directory/file cannot be accessed directly");
}
?>
<table class="ui very compact unstackable celled striped table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Permissions</th>
			<th>Size</th>
			<th>Last Modified</th>
		</tr>
	</thead>
	<tbody>
		<?php
		/**
		 * Format Variables Legend
		 * =======================
		 * %1 - File Name
		 * %2 - URI/URL
		 * %3 - Permissions
		 * %4 - Numeric Permissions
		 * %5 - Size
		 * %6 - Modified Date
		 */
		$link_fmt_start = '<tr><td><a href="%2$s">';
		$link_fmt_end   = ' %1$s</a></td><td class="collapsing"><samp>%3$s (%4$s)</samp></td><td class="collapsing">%5$s</td><td class="collapsing">%6$s</td></tr>';
		$norm_fmt_start = '<tr><td>';
		$norm_fmt_end   = ' %1$s</td><td class="collapsing"><samp>%3$s (%4$s)</samp></td><td class="collapsing">%5$s</td><td class="collapsing">%6$s</td></tr>';
		$default_fmt    = $norm_fmt_start.'<i class="file icon"></i>'.$norm_fmt_end;
		$dir            = $link_fmt_start.'<i class="folder outline icon"></i>'.$link_fmt_end;
		$git_dir        = $link_fmt_start.'<i class="github icon"></i>'.$link_fmt_end;
		$code_file      = $link_fmt_start.'<i class="file code outline icon"></i>'.$link_fmt_end;
		$code_file_alt  = $norm_fmt_start.'<i class="file code outline icon"></i>'.$norm_fmt_end;
		$text_file      = $link_fmt_start.'<i class="file text outline icon"></i>'.$link_fmt_end;
		$pdf_file       = $link_fmt_start.'<i class="file pdf outline icon"></i>'.$link_fmt_end;
		$word_file      = $link_fmt_start.'<i class="file word outline icon"></i>'.$link_fmt_end;
		$archive_file   = $link_fmt_start.'<i class="file archive outline icon"></i>'.$link_fmt_end;
		$audio_file     = $link_fmt_start.'<i class="file audio outline icon"></i>'.$link_fmt_end;
		$image_file     = $link_fmt_start.'<i class="file image outline icon"></i>'.$link_fmt_end;
		$movie_file     = $link_fmt_start.'<i class="file video outline icon"></i>'.$link_fmt_end;
		$ext = array(
			
		);
		$regex = array(
			
		);
		
		// makes looping through each item in the directory easier
		theme::display_index(
			// Default item format
			$norm_fmt_start.'<i class="file icon"></i>'.$norm_fmt_end,
			array(
				// Directories
				'folder'     => $dir,
				// Match both file names and directory names via regex
				'regex'      => array(
					// pattern => format
					'/\A\.git\Z/' => $git_dir
				),
				// File extensions (use regex to match directories)
				'extensions' => array(
					'.php'      => $code_file,
					'.json'     => $code_file,
					'.xml'      => $code_file,
					'.sh'       => $code_file_alt,
					'.bak'      => $code_file_alt,
					'.htaccess' => $code_file_alt,
					'.txt'      => $text_file,
					'.md'       => $text_file,
					'.png'      => $image_file,
					'.jpg'      => $image_file,
					'.jpeg'     => $image_file,
					'.gif'      => $image_file,
					'.pdf'      => $pdf_file,
					'.zip'      => $archive_file,
					'.tar'      => $archive_file,
					'.gz'       => $archive_file,
					'.7z'       => $archive_file,
					'.doc'      => $word_file,
					'.docx'     => $word_file,
					'.rtf'      => $word_file,
					'.mp3'      => $audio_file,
					'.m4a'      => $audio_file,
					'.acc'      => $audio_file,
					'.mp4'      => $movie_file,
					'.flv'      => $movie_file,
					'.wmv'      => $movie_file,
					'.mov'      => $movie_file
				)
			)
		);
		?>
	</tbody>
</table>