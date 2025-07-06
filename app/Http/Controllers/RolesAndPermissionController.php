<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        $roles       = Role::all();
        return view('admin.roles',compact('permissions','roles'));
    }

    public function add(){
        $permissions = Permission::all();
        $roles       = Role::all();
        return view('admin.add-role',compact('permissions','roles'));
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.update-role',compact('role','permissions','rolePermissions'));
    }

    public function store(Request $request){
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        foreach($request->selected_permissions as $permission){
            $role->givePermissionTo($permission);
        }
        return redirect()->route('roles.index');
    }

    public function update(Request $request){
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index');
    }

    public function destroy(Request $request){
        $role = Role::findOrFail($request->id);
        $role->delete();
        return redirect()->back();
    }



//create a title for the permission for the midder
   public function addPermissions(Request $request){
    $permissions = [
        ['name' => 'view_industry'                       ,'title'=>'View Industry'                   , 'details' => 'Allows the user to view industries in the system.'],
        ['name' => 'add_industry'                        ,'title'=>'Add Industry'                    , 'details' => 'Allows the user to add new industries to the system.'],
        ['name' => 'update_industry'                     ,'title'=>'Update Industry'                 , 'details' => 'Allows the user to update existing industry details.'],
        ['name' => 'delete_industry'                     ,'title'=>'Delete Industry'                 , 'details' => 'Allows the user to delete industries from the system.'],

        ['name' => 'view_company'                        ,'title'=>'View Company'                    , 'details' => 'Allows the user to view company information.'],
        ['name' => 'add_company'                         ,'title'=>'Add Company'                     , 'details' => 'Allows the user to add new companies to the system.'],
        ['name' => 'update_company'                      ,'title'=>'Update Company'                  , 'details' => 'Allows the user to update details for existing companies.'],
        ['name' => 'delete_company'                      ,'title'=>'Delete Company'                  , 'details' => 'Allows the user to delete companies from the system.'],

        ['name' => 'view_contact'                        ,'title'=>'View Contact'                    , 'details' => 'Allows the user to view contact information.'],
        ['name' => 'add_contact'                         ,'title'=>'Add Contact'                     , 'details' => 'Allows the user to add new contacts to the system.'],
        ['name' => 'update_contact'                      ,'title'=>'Update Contact'                  , 'details' => 'Allows the user to update existing contact information.'],
        ['name' => 'delete_contact'                      ,'title'=>'Delete Contact'                  , 'details' => 'Allows the user to delete contacts from the system.'],
        ['name' => 'assign_company_to_contact'           ,'title'=>'Assign Company To Contact'       , 'details' => 'Allows the user to assign company to contacts from the system.'],

        ['name' => 'view_lead'                           ,'title'=>'View Lead'                       , 'details' => 'Allows the user to view lead details.'],
        ['name' => 'add_lead'                            ,'title'=>'Add Lead'                        , 'details' => 'Allows the user to add new leads to the system.'],
        ['name' => 'update_lead'                         ,'title'=>'Update Lead'                     , 'details' => 'Allows the user to update details of existing leads.'],
        ['name' => 'delete_lead'                         ,'title'=>'Delete Lead'                     , 'details' => 'Allows the user to delete leads from the system.'],
        ['name' => 'assign_contact_to_lead'              ,'title'=>'Assign Contact To Lead'          , 'details' => 'Allows the user to assign contact to leads from the system.'],
        ['name' => 'assign_company_to_lead'              ,'title'=>'Assign Company To Lead'          , 'details' => 'Allows the user to assign company to leads from the system.'],

        ['name' => 'view_deal'                           ,'title'=>'View Deal'                       , 'details' => 'Allows the user to view details of deals.'],
        ['name' => 'add_deal'                            ,'title'=>'Add Deal'                        , 'details' => 'Allows the user to add new deals to the system.'],
        ['name' => 'update_deal'                         ,'title'=>'Update Deal'                     , 'details' => 'Allows the user to update existing deal details.'],
        ['name' => 'delete_deal'                         ,'title'=>'Delete Deal'                     , 'details' => 'Allows the user to delete deals from the system.'],
        ['name' => 'assign_contact_to_deal'              ,'title'=>'Assign Contact To Deal'          , 'details' => 'Allows the user to assign contact to deals from the system.'],
        ['name' => 'assign_company_to_deal'              ,'title'=>'Assign Company To Deal'          , 'details' => 'Allows the user to assign company to deals from the system.'],

        ['name' => 'view_all_pipeline'                   ,'title'=>'View All Pipeline'               , 'details' => 'Allows the user to view all pipelines stages and details.'],
        ['name' => 'view_pipeline'                       ,'title'=>'View Pipeline'                   , 'details' => 'Allows the user to view pipeline stages and details.'],
        ['name' => 'add_pipeline'                        ,'title'=>'Add Pipeline'                    , 'details' => 'Allows the user to add new pipelines to the system.'],
        ['name' => 'update_pipeline'                     ,'title'=>'Update Pipeline'                 , 'details' => 'Allows the user to update details of existing pipelines.'],
        ['name' => 'delete_pipeline'                     ,'title'=>'Delete Pipeline'                 , 'details' => 'Allows the user to delete pipelines from the system.'],

        ['name' => 'view_stage'                          ,'title'=>'View Stage'                      , 'details' => 'Allows the user to view stages within a pipeline.'],
        ['name' => 'add_stage'                           ,'title'=>'Add Stage'                       , 'details' => 'Allows the user to add new stages to pipelines.'],
        ['name' => 'update_stage'                        ,'title'=>'Update Stage'                    , 'details' => 'Allows the user to update details of existing stages.'],
        ['name' => 'delete_stage'                        ,'title'=>'Delete Stage'                    , 'details' => 'Allows the user to delete stages from pipelines.'],

        ['name' => 'role_table_view'                     ,'title'=>'Role table View'                 , 'details' => 'Allows the user to view roles in the system.'],
        ['name' => 'add_role_view'                       ,'title'=>'Add Role View'                   , 'details' => 'Allows the user to view add new roles to the system.'],
        ['name' => 'update_role_view'                    ,'title'=>'Update Role View'                , 'details' => 'Allows the user to view update existing roles.'],

        ['name' => 'add_role'                            ,'title'=>'Add Role'                        , 'details' => 'Allows the user to add new roles to the system.'],
        ['name' => 'update_role'                         ,'title'=>'Update Role'                     , 'details' => 'Allows the user to update existing roles.'],
        ['name' => 'delete_role'                         ,'title'=>'Delete Role'                     , 'details' => 'Allows the user to delete roles from the system.'],

        ['name' => 'view_all_notes'                      ,'title'=>'View All Notes'                  , 'details' => 'Allows the user to view all notes in the system.'],
        ['name' => 'view_note'                           ,'title'=>'View Note'                       , 'details' => 'Allows the user to view note in the system.'],
        ['name' => 'add_note'                            ,'title'=>'Add Note'                        , 'details' => 'Allows the user to add new notes to the system.'],
        ['name' => 'update_note'                         ,'title'=>'Update Note'                     , 'details' => 'Allows the user to update details of existing notes.'],
        ['name' => 'delete_note'                         ,'title'=>'Delete Note'                     , 'details' => 'Allows the user to delete notes from the system.'],

        ['name' => 'view_all_logs'                       ,'title'=>'View All Logs'                   , 'details' => 'Allows the user to view all system logs.'],
        ['name' => 'view_log'                            ,'title'=>'View Log'                        , 'details' => 'Allows the user to view system logs.'],
        ['name' => 'add_log'                             ,'title'=>'Add Log'                         , 'details' => 'Allows the user to add new entries to the system logs.'],
        ['name' => 'update_log'                          ,'title'=>'Update Log'                      , 'details' => 'Allows the user to update existing log entries.'],
        ['name' => 'delete_log'                          ,'title'=>'Delete Log'                      , 'details' => 'Allows the user to delete log entries from the system.'],

        ['name' => 'view_user'                           ,'title'=>'View User'                       , 'details' => 'Allows the user to view user profiles and details.'],
        ['name' => 'assign_roles'                        ,'title'=>'Assign Roles'                    , 'details' => 'Allows the user to assign roles to other users.'],
        ['name' => 'add_user'                            ,'title'=>'Add User'                        , 'details' => 'Allows the user to add new users to the system.'],
        ['name' => 'update_user'                         ,'title'=>'Update User'                     , 'details' => 'Allows the user to update details of existing users.'],
        ['name' => 'delete_user'                         ,'title'=>'Delete User'                     , 'details' => 'Allows the user to delete users from the system.'],

        ['name' => 'view_dashboard'                      ,'title'=>'View Dashboard'                  , 'details' => 'Allows the user to view the dashboard.'],

        // users permissions
        ['name' => 'view_users'                          ,'title'=>'View Users'                      , 'details' => 'Allows the user to view users in the system.'],
        ['name' => 'add_user'                            ,'title'=>'Add User'                        , 'details' => 'Allows the user to add new users to the system.'],
        ['name' => 'update_user'                         ,'title'=>'Update User'                     , 'details' => 'Allows the user to update existing user details.'],
        ['name' => 'delete_user'                         ,'title'=>'Delete User'                     , 'details' => 'Allows the user to delete users from the system.'],

    ];

    foreach($permissions as $permission){
        // SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'view_industry-web' for key 'permissions_name_guard_name_unique' (Connection: mysql, SQL: insert into `permissions` (`guard_name`, `name`, `title`, `details`, `updated_at`, `created_at`) values (web, view_industry, View Industry, Allows the user to view industries in the system., 2025-01-06 02:58:38, 2025-01-06 02:58:38))
        // check if permission already exists
        $permissionExists = Permission::where('name', $permission['name'])->first();
        if($permissionExists){
            continue;
        }
        $permissionObj          = new Permission();
        $permissionObj->name    = $permission['name'];
        $permissionObj->title    = $permission['title'];
        $permissionObj->details = $permission['details'];
        $permissionObj->save();
    }
    return response()->json(['message'=>'Permissions added successfully']);
    }
}
