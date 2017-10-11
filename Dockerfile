FROM php:7.1-cli

ENV ROOT_DIR=/app

# Setup user
ARG UID=1000
ARG GID=1000
ARG USERNAME=php
ARG GROUPNAME=php

RUN set -xe \
    && apt-get -y update && apt-get -y install wget git vim \
    && wget https://git.io/psysh -O /usr/bin/psysh \
    && chmod +x /usr/bin/psysh \
    && (git clone https://github.com/ncopa/su-exec /tmp/su-exec \
        && cd /tmp/su-exec && make all && install -m0755 su-exec /usr/bin \
        && cd -)
    
RUN set -xe \
    && groupadd -r -g ${GID} ${GROUPNAME} \
    && useradd -r -m -d ${ROOT_DIR} -u ${UID} -g ${GROUPNAME} -s /bin/bash ${USERNAME}

COPY ./install-composer.sh /tmp/install-composer.sh
RUN set -xe \
    && bash /tmp/install-composer.sh --install-dir=/usr/bin --filename=composer

USER ${USERNAME}
WORKDIR $ROOT_DIR
CMD ["/usr/bin/psysh"]
