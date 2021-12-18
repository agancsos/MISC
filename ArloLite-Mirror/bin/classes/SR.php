<?php
    class SR {
        public static $applicationName  = "Arlo Home";
        public static $applicationLabel = "Arlo Home";
        public static $copyrightText    = "Gancsos Labs";
        public static $loginButtonLabel = "Login";
        public static $configFilePath   = "/config/config.json";
        public static $tokenCookieName  = "ArloToken";
        public static $userCookieName   = "ArloUser";
		public static $baseRecordingDir = "/Volumes/g/Arlo/recordings";

		// Common
		public static $NOT_IMPLEMENTED_MESSAGE       = "Not implemented yet...";
		public static $COMMON_MISSING_FIELDS         = "Not all fields filled in...";
		public static $COMMON_SAVE_LABEL             = "Save";
		public static $COMMON_ADD_LABEL              = "Add";
		public static $COMMON_DELETE_LABEL           = "Delete";
		public static $COMMON_REMOVE_LABEL           = "Remove";

		// Settings
		public static $SETTINGS_PASSWORD_CURRENT_LABEL = "Current Password";
		public static $SETTINGS_PASSWORD_NEW_LABEL     = "New Password";
		public static $SETTINGS_PASSWORD_CONFIRM_LABEL = "Confirm";
		public static $SETTINGS_PASSWORD_NON_MATCH     = "Passwords do not match...";
		public static $SETTINGS_PASSWORD_WRONG_CURRENT = "Incorrect current password...";
		public static $SETTINGS_PASSWORD_SUCCESS       = "Password has been updated!";


		// Edit form
		public static $EDIT_FORM_DISABLE_OBJECT      = "Editing is disabled for the current item";
		public static $EDIT_FORM_SAVE_BUTTON_LABEL   = "Save";
		public static $EDIT_FORM_UPDATE_BUTTON_LABEL = "Update";
		public static $EDIT_FORM_DELETE_BUTTON_LABEL = "Delete";

		// Optima view panes
		public static $OPTIMA_PANE_PROPERTIES_HEADER = "Properties";
		public static $OPTIMA_PANE_TREE_HEADER       = "Object Navigation";
		public static $OPTIMA_PANE_EDITOR_HEADER     = "Editor";

		// Administration
		public static $ADMIN_PURGE_ADUITS_LABEL      = "Purge Audits";
		public static $ADMIN_DAYS_LABEL              = "Days";
		public static $ADMIN_USERS_SHOWGROUPS_LABEL  = "Show Groups";
		public static $ADMIN_USERS_ADD_LABEL         = "Create User";
		public static $ADMIN_USERS_RESET_LABEL       = "Reset Password";
    }
?>
