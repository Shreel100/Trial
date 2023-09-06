<?php 
  $events = get_field('rylib_events_widget_events', 'options');
  $filtered_events = array_filter($events, 'rylib_events_widget_filter');
?>

<?php if (!empty($filtered_events)) : ?>
  <ul class="rylib-events-widget">
    <?php foreach($filtered_events as $event) : ?>
      <?php $rylib_event_date = new DateTimeImmutable($event['date']); ?>
      <li class="event">
          <div class="datewrap">
            <div class="date">
              <?php echo $rylib_event_date->format('M j'); ?>
              </div>
            <div class="time">
              <?php echo $rylib_event_date->format('D') ?><br>
              <?php echo $event['start_time'] ?>-<?php echo $event['end_time'] ?>
            </div>
          </div>
          <div class="description">
            <a href="<?php echo $event['url'] ?>"><?php echo $event['text'] ?></a>
          </div>
        </li>
    <?php endforeach ?>
  </ul>
<?php endif ?>

<?php /*
<?php if ( have_rows('rylib_events_widget_events', 'options') ) : ?>
  <ul class="rylib-events-widget">
    <?php while( have_rows('rylib_events_widget_events', 'options') ): the_row(); ?>
      <?php $rylib_event_date = new DateTimeImmutable((get_sub_field('date'))); ?>
      <li class="event">
        <div class="datewrap">
          <div class="date">
            <?php echo $rylib_event_date->format('M j'); ?>
            </div>
          <div class="time">
            <?php echo $rylib_event_date->format('D') ?><br>
            <?php the_sub_field('start_time'); ?>-<?php the_sub_field('end_time'); ?>
          </div>
        </div>
        <div class="description">
          <a href="<?php the_sub_field('url') ?>"><?php the_sub_field('text'); ?></a>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
*/ ?>
