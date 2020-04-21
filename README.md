# ads-app-01

https://159.69.248.135/

При развертывании на новом сервере правим:
1. hosts
[all]
swarm ansible_ssh_host=159.69.248.135 ansible_python_interpreter=/usr/bin/python3
2. ansible.cfg
sudo_user      = root
remote_user    = root
3. group_vars/all
# Swarm vars
-user_name: "user007"
-project_dir: "app-01"
-var_build_path: "{{ project_dir }}/images/php"
-var_advertise_addr: "159.69.248.135"
-var_network_name: "appnet"
-var_mtu: "1200"
-var_stack_name: "apps"
-db_root_password: "db_root_password"
-db_user_password: "db_user_password"
