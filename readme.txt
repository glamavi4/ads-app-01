https://ads-app-01.prokit.me

При развертывании на новом сервере правим:
1. hosts
      - [all]
      - swarm ansible_ssh_host=ads-app-01.prokit.me ansible_python_interpreter=/usr/bin/python3
2. ansible.cfg
      - sudo_user      = root
      - remote_user    = root
3. group_vars/all
      - user_name: "user007"
      - project_dir: "app-01"
      - var_advertise_addr: "159.69.248.135"
      - var_network_name: "appnet"
      - var_mtu: "1200"
      - var_stack_name: "apps"
      - db_root_password: "db_root_password"
      - db_user_password: "db_user_password"
4. В playbook.yml раскомментируем роли!!!
   - update
   - create_user
   - docker
   - dir_copy
   - swarm_init


docker service create \
    --name traefik \
    --constraint=node.role==manager \
    --publish 80:80 --publish 8080:8080 \
    --mount type=bind,source=/var/run/docker.sock,target=/var/run/docker.sock \
    --network appnet \
    traefik:latest \
    --docker \
    --docker.swarmMode \
    --docker.domain=traefik \
    --docker.watch \
    --api

mkdir /home/user007/app-01/mysql

docker exec -it fce7fc5c7680 bash -c 'apt-get -y update && apt -y install nano mc'
