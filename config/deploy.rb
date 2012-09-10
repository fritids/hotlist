set :stages, %w(production staging)

# The capistrano-ext allows us to have multiple setups so that we can choose
# which server to deploy to.  The specific configurations are under the
# deploy directory.
require "capistrano/ext/multistage"

namespace :deploy do

  task :add_links do
    def link(rp, sp)
      run <<-CMD
cd #{release_path} && ln -nfs #{shared_path}/#{sp} #{release_path}/#{rp}
CMD
    end

    #link 'db/shared', 'db'
  end
end


after 'deploy:update_code', 'deploy:add_links'

