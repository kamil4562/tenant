FROM aleextra/php:8.2.7

RUN apt remove nodejs npm


ENV NVM_VERSION v0.34.0
ENV NODE_VERSION v21.2.0
ENV NVM_DIR /usr/local/nvm
RUN mkdir $NVM_DIR
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.34.0/install.sh | bash

ENV NODE_PATH $NVM_DIR/$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN echo "source $NVM_DIR/nvm.sh && \
    nvm install $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    nvm use default" | bash

RUN apt-get install -y libicu-dev \
  && docker-php-ext-configure intl \
  &&  docker-php-ext-install intl