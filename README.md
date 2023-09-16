# i-Educar Data hook

Módulo de sincronização de dados do [i-Educar](https://github.com/portabilis/i-educar) com sua aplicação.

## Instalação

> Para usuários Docker, executar os comandos `# (Docker)` ao invés da linha seguinte.

Clone este repositório a partir da raiz do i-Educar:

```bash
git clone git@github.com:jrbarros/i-educar-data-hook.git packages/jrbarros/i-educar-data-hook
```

Instale o pacote:

```bash
# (Docker) docker-compose exec php composer plug-and-play
composer plug-and-play
```

## Configuração

```bash
# Geral config
DATA_HOOK_DEFAULT_DRIVER=

# Drivers config

# HTTP driver config
DATA_HOOK_HTTP_URL=
DATA_HOOK_HTTP_TOKEN=
DATA_HOOK_HTTP_DEFAULT_PATH=

# Redis driver config
DATA_HOOK_REDIS_QUEUE=

# Config listed in config/data-hook.php
DATA_HOOK_SEND_STUDENT_CREATE_DRIVER=
DATA_HOOK_SEND_STUDENT_CREATE_RESOURCE=
DATA_HOOK_SEND_STUDENT_UPDATE_DRIVER=
DATA_HOOK_SEND_STUDENT_UPDATE_RESOURCE=
```

## Uso

As configuracoes de envio de dados para o i-Educar estao no arquivo `config/data-hook.php`.
As configurações para onde os dados de cada listener serão enviados estão no arquivo `config/listeners_config.php`.
Cada listener pode ter uma configuração de driver diferente, ou seja, o listener `student.create` pode enviar os dados para o i-Educar via HTTP e o listener `student.update` pode enviar os dados para o i-Educar via Redis.

## Perguntas frequentes (FAQ)

Algumas perguntas aparecem recorrentemente. Olhe primeiro por aqui: [FAQ](https://github.com/portabilis/i-educar-website/blob/master/docs/faq.md).


### Todo
- [ ] Criar mais testes 
- [ ] Adicionar mais listeners
- [ ] Adicionar driver database
- [ ] Adicionar driver beanstalkd
- [ ] Adicionar driver sqs
- [ ] Adicionar driver rabbitmq
- [ ] Adicionar driver kafka
---
