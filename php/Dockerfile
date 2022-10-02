FROM centos:7
# Install Apache
RUN yum -y update
RUN yum -y install httpd httpd-tools

# Install EPEL Repo
RUN rpm -Uvh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm \
 && rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

# Install PHP
RUN yum -y install php71w php71w-bcmath php71w-cli php71w-common php71w-gd php71w-intl php71w-ldap php71w-mbstring \
    php71w-mysql php71w-pear php71w-soap php71w-xml php71w-xmlrpc 
# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
COPY ./httpd/httpd.conf /etc/httpd/conf/
CMD ["/usr/sbin/httpd","-D","FOREGROUND"]