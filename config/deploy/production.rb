set :application, "hotlisttour"
set :domain, "origin.ads.thestudio.condenast.com"

set :user, "nwebb"
set :runner, user

set :deploy_to, "/srv/www/ads.thestudio.condenast.com/apps/#{application}"
set :ssh_options, { :forward_agent => true }
set :default_run_options, { :pty => true }
set :use_sudo, false

set :repository, "."
set :scm, :none
set :deploy_via, :copy
set :copy_exclude, [ ".hg", "log", "tmp", "*.tmproj", "*.swp", "*.sqlite3", "public/system" ]
#set :copy_dir, "/tmp" #need to comment this out to work for nate

role :app, domain, :cron => true
role :web, domain
role :db,  domain, :primary => true
