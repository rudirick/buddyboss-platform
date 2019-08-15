<?php
/**
 * BuddyBoss LearnDash integration topics reports generator.
 *
 * @package BuddyBoss\LearnDash
 * @since BuddyBoss 1.0.0
 */

namespace Buddyboss\LearndashIntegration\Buddypress\Generators;

use Buddyboss\LearndashIntegration\Library\ReportsGenerator;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Extends report generator for topics reports
 *
 * @since BuddyBoss 1.0.0
 */
class TopicsReportsGenerator extends ReportsGenerator
{
	/**
	 * Constructor
	 *
	 * @since BuddyBoss 1.0.0
	 */
	public function __construct()
	{
		$this->completed_table_title = __('Completed Topics', 'buddyboss');
		$this->incompleted_table_title = __('Incomplete Topics', 'buddyboss');

		parent::__construct();
	}

	/**
	 * Returns the columns and their settings
	 *
	 * @since BuddyBoss 1.0.0
	 */
	protected function columns()
	{
		return [
			'user_id'         => $this->column('user_id'),
			'user'            => $this->column('user'),
			'course_id'       => $this->column('course_id'),
			'course'          => $this->column('course'),
			'topic'           => [
				'label'     => __( 'Topic', 'buddyboss' ),
				'sortable'  => true,
				'order_key' => 'post_title',
			],
			'start_date'      => $this->column('start_date'),
			'completion_date' => $this->column('completion_date'),
			'time_spent'      => $this->column('time_spent'),
		];
	}

	/**
	 * Format the activity results for each column
	 *
	 * @since BuddyBoss 1.0.0
	 */
	protected function formatData($activity)
	{
		return [
			'user_id'         => $activity->user_id,
			'user'            => $activity->user_display_name,
			'course_id'       => $activity->activity_course_id,
			'course'          => $activity->activity_course_title,
			'topic'           => $activity->post_title,
			'start_date'      => $this->startDate( $activity),
			'completion_date' => $this->completionDate($activity),
			'time_spent'      => $this->timeSpent($activity),
		];
	}
}
