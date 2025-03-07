{ pkgs, config, ... }:

{
  cachix.enable = false;
  dotenv.enable = true;

  packages = [ pkgs.php83Packages.php-cs-fixer ];

  languages.javascript = {
    enable = true;
    package = pkgs.nodejs_22;
    npm.enable = true;
  };

  languages.php = {
    enable = true;
    package = pkgs.php83;
  };

  services.mysql = {
    enable = true;
    settings = { mysqld = { port = config.env.DB_PORT; }; };
    initialDatabases = [{ name = config.env.DB_DATABASE; }];
    ensureUsers = [{
      name = config.env.DB_USERNAME;
      password = config.env.DB_PASSWORD;
      ensurePermissions = {
        "${config.env.DB_DATABASE}.*" = "ALL PRIVILEGES";
        "*.*" = "SELECT";
      };
    }];
  };
}
