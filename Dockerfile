FROM ekidd/rust-musl-builder:stable as builder


USER root
RUN USER=root cargo new --bin pennbauman_com
WORKDIR ./pennbauman_com
COPY ./Cargo.lock ./Cargo.lock
COPY ./Cargo.toml ./Cargo.toml
RUN cargo fetch
COPY ./src ./src
RUN cargo build --release --target x86_64-unknown-linux-musl

COPY ./target/x86_64-unknown-linux-musl ./target/x86_64-unknown-linux-musl
COPY ./templates ./templates
COPY ./files ./files

RUN rm -f ./target/x86_64-unknown-linux-musl/deps/pennbauman_com*
RUN cargo build --release --target x86_64-unknown-linux-musl


FROM alpine:latest


ARG APP=/usr/src/app
ARG APP_USER=appuser
USER root

ENV TIDE_DIR=${APP}
EXPOSE 8080

RUN addgroup --system ${APP_USER}
RUN adduser --no-create-home --system --ingroup $APP_USER $APP_USER

COPY --from=builder /home/rust/src/pennbauman_com/target/x86_64-unknown-linux-musl/release/pennbauman_com ${APP}/pennbauman_com
COPY --from=builder /home/rust/src/pennbauman_com/templates ${APP}/templates
COPY --from=builder /home/rust/src/pennbauman_com/files ${APP}/files

RUN chown -R $APP_USER:$APP_USER ${APP}
USER $APP_USER
WORKDIR ${APP}

CMD ["./pennbauman_com"]
