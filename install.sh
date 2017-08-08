INSTALL_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
mkdir -p ${INSTALL_DIR}/../dance_data/gallery
mkdir -p ${INSTALL_DIR}/../dance_data/thumbs

ln -sfn ${INSTALL_DIR}/../dance_data/gallery ${INSTALL_DIR}/frontend/web/gallery
ln -sfn ${INSTALL_DIR}/../dance_data/thumbs ${INSTALL_DIR}/frontend/web/thumbs

php yii migrate --interactive=0

echo "Install completed"
exit 1
