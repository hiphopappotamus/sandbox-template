<div class="grid">
 <?php
  if (have_rows('cards_grid')) : while (have_rows('cards_grid')) : the_row(); // repeater

      // one_col : One column
      // two_col : Two column
      // three_col : Three column
      // four_col : Four column

      // TODO: set up background-color options for these mofos!

      $card = get_sub_field('card'); // group
      $card_layout = $card['card_layout'];
      $layout_value = $card_layout['value'];
      $layout_label = $card_layout['label'];
      $card_one_col = $card['card_one_col'];

      $card_two_column      = $card['card_two_column']; // group
      $twocol_left_card            = $card_two_column['left_card'];
      $twocol_right_card           = $card_two_column['right_card'];

      $twocol_array = array(
        'left'    =>  $twocol_left_card,
        'right'   =>  $twocol_right_card
      );

      $card_three_column    = $card['card_three_column']; // group
      $threecol_left_card            = $card_three_column['left_card'];
      $threecol_middle_card          = $card_three_column['middle_card'];
      $threecol_right_card           = $card_three_column['right_card'];

      $threecol_array = array(
        'left'    =>  $threecol_left_card,
        'middle'  =>  $threecol_middle_card,
        'right'   =>  $threecol_right_card
      );

      $card_four_column     = $card['card_four_column']; // group
      $fourcol_first_card           = $card_four_column['first_card'];
      $fourcol_second_card          = $card_four_column['second_card'];
      $fourcol_third_card           = $card_four_column['third_card'];
      $fourcol_fourth_card          = $card_four_column['fourth_card'];

      $fourcol_array = array(
        'first'   =>  $fourcol_first_card,
        'second'  =>  $fourcol_second_card,
        'third'   =>  $fourcol_third_card,
        'fourth'  =>  $fourcol_fourth_card
      );

      $cards_container_class = '';
      switch ($layout_value) {
        case 'one_col':
          $cards_container_class .= 'g-col-12';
          break;
        case 'two_col':
          $cards_container_class .= 'g-col-12 g-col-md-6';
          break;
        case 'three_col':
          $cards_container_class .= 'g-col-12 g-col-md-6 g-col-lg-4';
          break;
        case 'four_col':
          $cards_container_class .= 'g-col-12 g-col-md-6 g-col-lg-4 g-col-xl-3';
          break;
        default:
          return;
          break;
      }
  ?>

 <?php
      switch ($layout_value) {
        case 'one_col':
          echo $card_one_col;
          break;
        case 'two_col':
          foreach ($twocol_array as $col) {
            echo '<div class="' . $cards_container_class . '">'
              . $col .
              '</div>';
          };
          break;
        case 'three_col';
          foreach ($threecol_array as $threecol => $col) {
            echo '<div class="' . $cards_container_class . '">'
              . $col .
              '</div>';
          };
          break;
        case 'four_col':
          foreach ($fourcol_array as $fourcol => $col) {
            echo '<div class="' . $cards_container_class . '">'
              . $col .
              '</div>';
          }
          break;
        default:
          return;
          break;
      }
      ?>

 <?php endwhile;
  endif; ?>
</div>