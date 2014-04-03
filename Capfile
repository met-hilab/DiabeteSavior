# Uncomment if you are using Rails' asset pipeline
    # load 'deploy/assets'
#load 'deploy' # remove this line to skip loading any of the default tasks

set :application, "CS673 - Diabetes Sabior"
set :scm, :git
set :repository,  "git@github.com:bumetcs/cs673.git"
set :scm_passphrase, ""

set :user, "deploy"
set :use_sudo, false
set :normalize_asset_timestamps, false
set :keep_releases, 5

# set :scm, :git # You can set :scm explicitly or Capistrano will make an intelligent guess based on known version control directory names
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`
#require 'capistrano/ext/multistage'
#set :stages, ["staging", "production"]
#set :default_stage, "staging"

#role :web, "cs673.jasonl.biz"                 # Your HTTP server, Apache/etc

# AWS server
server "met-hilab.org", :app, :web, :db, :primary => true

# BU VM server
#server "128.197.103.118", :app, :web, :db, :primary => true

set :deploy_to, "/srv/110_hilab_projects_php/101_diabetesavior/"

#role :app, "your app-server here"                          # This may be the same as your `Web` server
#role :db,  "your primary db-server here", :primary => true # This is where Rails migrations will run
#role :db,  "your slave db-server here"

# if you want to clean up old releases on each deploy uncomment this:
# after "deploy:restart", "deploy:cleanup"

# if you're still using the script/reaper helper you will need
# these http://github.com/rails/irs_process_scripts

# If you are using Passenger mod_rails uncomment this:
# namespace :deploy do
#   task :start do ; end
#   task :stop do ; end
#   task :restart, :roles => :app, :except => { :no_release => true } do
#     run "#{try_sudo} touch #{File.join(current_path,'tmp','restart.txt')}"
#   end
# end
after "deploy:update", "deploy:cleanup" 
after "deploy:update_code", "cs673:symlink"
after "deploy:setup", "cs673:make_tmp"

namespace :cs673 do
  desc "Create symlink"
  task :symlink do
    run "rm -rf #{release_path}/app/tmp"
    #run "rm -rf #{shared_path}/tmp"
    #run "mkdir -m 777 -p #{shared_path}/tmp"
    run "ln -nfs #{shared_path}/tmp #{release_path}/app/tmp"
  end

  desc "Create tmp folder"
  task :make_tmp do 
    run "mkdir -m 777 -p #{shared_path}/tmp"
  end 
end