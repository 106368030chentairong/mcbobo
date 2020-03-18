domain=$1
echo "domain: $1"
if [ -z "$1" ]; then
    echo "domain empty, exiting..."
    exit 1
fi

filename="server"

if [ ! -f "ca.key" ]; then
    echo "CA not exist, ready to create..."
    openssl genrsa -out ca.key 2048
    openssl req -new -key ca.key -out ca.csr -sha256 -subj "/C=CN/ST=BeiJing/L=BeiJing/O=TEST/OU=web/CN=test.com"
    echo "basicConstraints=CA:TRUE">ca.ext
    openssl x509 -req -in ca.csr -signkey ca.key -out ca.crt -extfile ca.ext -sha256 -days 825
fi

echo "generating site cert..."
openssl genrsa -out $filename.key 2048
openssl req -new -key $filename.key -out $filename.csr -sha256 -subj "/C=CN/ST=BeiJing/L=BeiJing/O=TEST/OU=web/CN=$domain"
echo "authorityKeyIdentifier=keyid,issuer
basicConstraints=CA:FALSE
keyUsage=digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment
extendedKeyUsage=serverAuth,OCSPSigning
subjectAltName=@alt_names

[alt_names]
DNS.1=$domain
DNS.2=*.$domain">$filename.ext
openssl x509 -req -in $filename.csr -CA ca.crt -CAkey ca.key -CAcreateserial -out $filename.crt -extfile $filename.ext -sha256 -days 824
echo "done"
