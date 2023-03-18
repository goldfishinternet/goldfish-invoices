<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'team_create',
            ],
            [
                'id'    => 21,
                'title' => 'team_edit',
            ],
            [
                'id'    => 22,
                'title' => 'team_show',
            ],
            [
                'id'    => 23,
                'title' => 'team_delete',
            ],
            [
                'id'    => 24,
                'title' => 'team_access',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_edit',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 28,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 29,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 30,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 31,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 32,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 33,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 34,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 35,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 36,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 37,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 38,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 39,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 40,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 41,
                'title' => 'product_create',
            ],
            [
                'id'    => 42,
                'title' => 'product_edit',
            ],
            [
                'id'    => 43,
                'title' => 'product_show',
            ],
            [
                'id'    => 44,
                'title' => 'product_delete',
            ],
            [
                'id'    => 45,
                'title' => 'product_access',
            ],
            [
                'id'    => 46,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 47,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 48,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 49,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 50,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 51,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 52,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 53,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 54,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 55,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 56,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 57,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 58,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 59,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 60,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 61,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 62,
                'title' => 'system_calendar_access',
            ],
            [
                'id'    => 63,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 64,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 65,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 66,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 67,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 68,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 69,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 70,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 71,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 72,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 73,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 74,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 75,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 76,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 77,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 78,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 79,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 80,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 81,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 82,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 83,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 84,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 85,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 86,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 87,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 88,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 89,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 90,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 91,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 92,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 93,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 94,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 95,
                'title' => 'task_create',
            ],
            [
                'id'    => 96,
                'title' => 'task_edit',
            ],
            [
                'id'    => 97,
                'title' => 'task_show',
            ],
            [
                'id'    => 98,
                'title' => 'task_delete',
            ],
            [
                'id'    => 99,
                'title' => 'task_access',
            ],
            [
                'id'    => 100,
                'title' => 'task_calendar_access',
            ],
            [
                'id'    => 101,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 102,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 103,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 104,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 105,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 106,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 107,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 108,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 109,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 110,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 111,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 112,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 113,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 114,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 115,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 116,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 117,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 118,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 119,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 120,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 121,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 122,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 123,
                'title' => 'course_create',
            ],
            [
                'id'    => 124,
                'title' => 'course_edit',
            ],
            [
                'id'    => 125,
                'title' => 'course_show',
            ],
            [
                'id'    => 126,
                'title' => 'course_delete',
            ],
            [
                'id'    => 127,
                'title' => 'course_access',
            ],
            [
                'id'    => 128,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 129,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 130,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 131,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 132,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 133,
                'title' => 'test_create',
            ],
            [
                'id'    => 134,
                'title' => 'test_edit',
            ],
            [
                'id'    => 135,
                'title' => 'test_show',
            ],
            [
                'id'    => 136,
                'title' => 'test_delete',
            ],
            [
                'id'    => 137,
                'title' => 'test_access',
            ],
            [
                'id'    => 138,
                'title' => 'question_create',
            ],
            [
                'id'    => 139,
                'title' => 'question_edit',
            ],
            [
                'id'    => 140,
                'title' => 'question_show',
            ],
            [
                'id'    => 141,
                'title' => 'question_delete',
            ],
            [
                'id'    => 142,
                'title' => 'question_access',
            ],
            [
                'id'    => 143,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 144,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 145,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 146,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 147,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 148,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 149,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 150,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 151,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 152,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 153,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 154,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 155,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 156,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 157,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 158,
                'title' => 'client_create',
            ],
            [
                'id'    => 159,
                'title' => 'client_edit',
            ],
            [
                'id'    => 160,
                'title' => 'client_show',
            ],
            [
                'id'    => 161,
                'title' => 'client_delete',
            ],
            [
                'id'    => 162,
                'title' => 'client_access',
            ],
            [
                'id'    => 163,
                'title' => 'client_contact_create',
            ],
            [
                'id'    => 164,
                'title' => 'client_contact_edit',
            ],
            [
                'id'    => 165,
                'title' => 'client_contact_show',
            ],
            [
                'id'    => 166,
                'title' => 'client_contact_delete',
            ],
            [
                'id'    => 167,
                'title' => 'client_contact_access',
            ],
            [
                'id'    => 168,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 169,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 170,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 171,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 172,
                'title' => 'invoice_access',
            ]
        ];

        Permission::insert($permissions);
    }
}
