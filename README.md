# Create .env
See .env.example

# Build
`docker compose up -d --build --remove-orphans`

# Generate cert
`rm -Rf .docker/nginx/certs/jeffrey.test.*`

`docker-compose run --rm nginx sh -c "cd /etc/nginx/certs && touch openssl.cnf && cat /etc/ssl/openssl.cnf > openssl.cnf && echo \"\" >> openssl.cnf && echo \"[SAN]\" >> openssl.cnf && echo \"subjectAltName=DNS.1:jeffrey.test,DNS.2:*.jeffrey.test\" >> openssl.cnf && openssl req -x509 -sha256 -nodes -newkey rsa:4096 -keyout jeffrey.test.key -out jeffrey.test.crt -days 3650 -subj \"/CN=*.jeffrey.test\" -config openssl.cnf -extensions SAN && rm openssl.cnf"`

## MacOS
`sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain .docker/nginx/certs/jeffrey.test.crt`
## Windows
`certutil -addstore -f "Root" ".docker\nginx\certs\jeffrey.test.crt"`
