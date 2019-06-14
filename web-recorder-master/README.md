# web-recorder
목소리를 녹음하는 웹앱입니다.

## Development Environment

이 [문서](https://docs.bitnami.com/containers/how-to/create-amp-environment-containers/)를 바탕으로하여 docker를 이용한 LAMP stack에서 개발했습니다. 구축 중 다음과 같은 문제가 발생하여 해결했습니다. 단 위 문서가 out-dated 이므로 https://github.com/bitnami/bitnami-docker-apache 등을 추가로 참고했습니다. 특히 "Notable Changes"를 유심히 살펴야 합니다.


https://github.com/bitnami/bitnami-docker-mariadb/issues/136#issuecomment-354644226

`chown 1001:1001 -R .`

"Step 2: Configure The Apache Virtual Host" 과정에서 문제가 생겨 Virtual Host 설정 생략했습니다. https://github.com/bitnami/bitnami-docker-wordpress/issues/105 나 https://github.com/bitnami/bitnami-docker-testlink/issues/56 와 유사하게 `Error executing 'postInstallation': Module mod_version is not present in the configuration file, you need to provide a module identifier in the options parameter along with the module name` 오류가 발생하였습니다.

아래의 `myapp.conf` 파일을 사용하여 성공적으로 동작하였습니다. 이 vhost 설정 과정은 Document Root를 지정하기 위해 필요한 것 같습니다.
```
LoadModule proxy_fcgi_module modules/mod_proxy_fcgi.so
<VirtualHost *:8080>
  ServerName www.example.com
  DocumentRoot "/app"
  ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://php-fpm:9000/app/$1
  <Directory "/app">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    DirectoryIndex index.php
  </Directory>
</VirtualHost>
```


SERVER-3(118.130.237.19)에서 운영될 예정이었으나, 해당 서버는 공유기로 인해 port-forwarding을 원격으로 진행하기 어려워 부득이하게 SERVER-1(118.130.237.21)에서 운영합니다.


## Implementation

### Library

총 2개의 라이브러리를 사용하였습니다. [waveform-playlist](https://github.com/naomiaro/waveform-playlist)가 필요한 대부분의 기능을 구현하였고, Microsoft Edge 환경에서 녹음이 되지 않는 문제를 해결하기 위하여 [MediaStreamRecorder](https://github.com/streamproc/MediaStreamRecorder)를 사용하였습니다. 

이 두 라이브러리 모두 원본과 다릅니다. [waveform-playlist](https://github.com/naomiaro/waveform-playlist)는 [fork한 repo](https://github.com/a3626a/waveform-playlist)에서 수정사항을 확인할 수 있습니다. [MediaStreamRecorder](https://github.com/streamproc/MediaStreamRecorder)는 직접 js 파일을 직접 수정하였기 때문에 해당 파일을 내에서 '이창환'으로 검색하면 주석을 통해 변경사항을 확인할 수 있습니다.

[waveform-playlist](https://github.com/naomiaro/waveform-playlist)는 Microsoft Edge 호환성 개선, 구간 삭제 기능 추가가 이루어졌고, [MediaStreamRecorder](https://github.com/streamproc/MediaStreamRecorder)는 [waveform-playlist](https://github.com/naomiaro/waveform-playlist)과 병합을 위한 전송 형식 추가, 이벤트 추가가 이루어졌습니다.

위 수정사항과 관련하여 각각의 repository 에 issue를 제출한 상태입니다.


### html / css

html 디자인은 [waveform-playlist](https://github.com/naomiaro/waveform-playlist)의 [예시](http://naomiaro.github.io/waveform-playlist/web-audio-editor.html)를 거의 그대로 사용하였습니다.

## Demo

https가 아니기에 Chrome에서 녹음 기능이 동작하지 않습니다.

http://118.130.237.21:8080/web-audio-editor.html
