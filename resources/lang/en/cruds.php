<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
            'is_approved'              => 'Is Approved',
            'is_approved_helper'       => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Event',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Attributes',
            'properties_helper'   => ' ',
            'host'                => 'IP',
            'host_helper'         => ' ',
            'created_at'          => 'Event time',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'link'              => 'Link',
            'link_helper'       => ' ',
            'users'             => 'Users',
            'users_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'productCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'productTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'price'              => 'Price',
            'price_helper'       => ' ',
            'category'           => 'Categories',
            'category_helper'    => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'photo'              => 'Photo',
            'photo_helper'       => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'systemCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'basicCRM' => [
        'title'          => 'Basic CRM',
        'title_singular' => 'Basic CRM',
    ],
    'crmStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmCustomer' => [
        'title'          => 'Customers',
        'title_singular' => 'Customer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'first_name'         => 'First Name',
            'first_name_helper'  => ' ',
            'last_name'          => 'Last Name',
            'last_name_helper'   => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'phone'              => 'Phone',
            'phone_helper'       => ' ',
            'address'            => 'Address',
            'address_helper'     => ' ',
            'skype'              => 'Skype',
            'skype_helper'       => ' ',
            'website'            => 'Website',
            'website_helper'     => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'crmNote' => [
        'title'          => 'Notes',
        'title_singular' => 'Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crmDocument' => [
        'title'          => 'Documents',
        'title_singular' => 'Document',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'customer'             => 'Customer',
            'customer_helper'      => ' ',
            'document_file'        => 'File',
            'document_file_helper' => ' ',
            'name'                 => 'Document name',
            'name_helper'          => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'taskManagement' => [
        'title'          => 'Task management',
        'title_singular' => 'Task management',
    ],
    'taskStatus' => [
        'title'          => 'Statuses',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'taskTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'task' => [
        'title'          => 'Tasks',
        'title_singular' => 'Task',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'tag'                => 'Tags',
            'tag_helper'         => ' ',
            'attachment'         => 'Attachment',
            'attachment_helper'  => ' ',
            'due_date'           => 'Due date',
            'due_date_helper'    => ' ',
            'assigned_to'        => 'Assigned To',
            'assigned_to_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'taskCalendar' => [
        'title'          => 'Calendar',
        'title_singular' => 'Calendar',
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contactManagement' => [
        'title'          => 'Contact Management',
        'title_singular' => 'Contact Management',
    ],
    'contactCompany' => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'company_name'           => 'Company name',
            'company_name_helper'    => ' ',
            'company_address'        => 'Address',
            'company_address_helper' => ' ',
            'company_website'        => 'Website',
            'company_website_helper' => ' ',
            'company_email'          => 'Email',
            'company_email_helper'   => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'contactContact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'company'                   => 'Company',
            'company_helper'            => ' ',
            'contact_first_name'        => 'First name',
            'contact_first_name_helper' => ' ',
            'contact_last_name'         => 'Last name',
            'contact_last_name_helper'  => ' ',
            'contact_phone_1'           => 'Phone 1',
            'contact_phone_1_helper'    => ' ',
            'contact_phone_2'           => 'Phone 2',
            'contact_phone_2_helper'    => ' ',
            'contact_email'             => 'Email',
            'contact_email_helper'      => ' ',
            'contact_skype'             => 'Skype',
            'contact_skype_helper'      => ' ',
            'contact_address'           => 'Address',
            'contact_address_helper'    => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'course' => [
        'title'          => 'Courses',
        'title_singular' => 'Course',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'teacher'             => 'Teacher',
            'teacher_helper'      => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'thumbnail'           => 'Thumbnail',
            'thumbnail_helper'    => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'students'            => 'Students',
            'students_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'lesson' => [
        'title'          => 'Lessons',
        'title_singular' => 'Lesson',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'course'              => 'Course',
            'course_helper'       => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'thumbnail'           => 'Thumbnail',
            'thumbnail_helper'    => ' ',
            'short_text'          => 'Short Text',
            'short_text_helper'   => ' ',
            'long_text'           => 'Long Text',
            'long_text_helper'    => ' ',
            'video'               => 'Video',
            'video_helper'        => ' ',
            'position'            => 'Position',
            'position_helper'     => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'is_free'             => 'Is Free',
            'is_free_helper'      => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'test' => [
        'title'          => 'Tests',
        'title_singular' => 'Test',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'course'              => 'Course',
            'course_helper'       => ' ',
            'lesson'              => 'Lesson',
            'lesson_helper'       => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'question' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'course'                => 'Course',
            'course_helper'         => ' ',
            'question_text'         => 'Question Text',
            'question_text_helper'  => ' ',
            'question_image'        => 'Question Image',
            'question_image_helper' => ' ',
            'points'                => 'Points',
            'points_helper'         => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'questionOption' => [
        'title'          => 'Question Options',
        'title_singular' => 'Question Option',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'question'           => 'Question',
            'question_helper'    => ' ',
            'option_text'        => 'Option text',
            'option_text_helper' => ' ',
            'is_correct'         => 'Is Correct',
            'is_correct_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'testResult' => [
        'title'          => 'Test Results',
        'title_singular' => 'Test Result',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'test'              => 'Test',
            'test_helper'       => ' ',
            'student'           => 'Student',
            'student_helper'    => ' ',
            'score'             => 'Score',
            'score_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'testAnswer' => [
        'title'          => 'Test Answers',
        'title_singular' => 'Test Answer',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'test_result'        => 'Test Result',
            'test_result_helper' => ' ',
            'question'           => 'Question',
            'question_helper'    => ' ',
            'option'             => 'Option',
            'option_helper'      => ' ',
            'is_correct'         => 'Is Correect',
            'is_correct_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
];
